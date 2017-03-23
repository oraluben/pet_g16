<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 3/21/2017
 * Time: 3:16 PM
 */

namespace app\controllers;


use app\actions\CreateCaseAction;
use app\models\PetCaseClassification;
use Codeception\Module\Queue;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\rest\Controller;

class CaseController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        unset($behaviors['contentNegotiator']['formats']['application/xml']);

        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'allow' => true,
                    'actions' => ['create'],
                    'verbs' => ['POST'],
                ],
                [
                    'allow' => true,
                    'actions' => ['classifications'],
                    'verbs' => ['GET'],
                ],
            ],
        ];

        return $behaviors;
    }

    public function actions()
    {
        return [
            'create' => CreateCaseAction::className(),
        ];
    }

    public function actionClassifications()
    {
        $table = PetCaseClassification::find()->all();
        $res = [];
        $tree = [];
        $q = [];
        foreach ($table as $c) {
            /** @var PetCaseClassification $c */
            if (!is_null($c->parent)) {
                $_c = ArrayHelper::getValue($res, $c->parent, []);
                $_c[] = [$c->id, $c->classification_name];
                $res[$c->parent] = $_c;
            } else {
                $_root = [$c->id, $c->classification_name];
                $tree[] = &$_root;
                $q[] = &$_root;
            }
        }

        while (!empty($q)) {
            $c = &$q[0];
            if (ArrayHelper::keyExists($c[0], $res)) {
                $child_list = ArrayHelper::getValue($c, 2, []);
                foreach (ArrayHelper::getValue($res, $c[0], []) as $_c) {
                    $cur_value = [$_c[0], $_c[1]];
                    $q[] = &$cur_value;
                    $child_list[] = &$cur_value;
                    unset($cur_value);
                }
                $c[2] = $child_list;
            }
            array_shift($q);
        }

//        return $tree;
        return $table;
    }
}