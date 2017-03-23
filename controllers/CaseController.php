<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 3/21/2017
 * Time: 3:16 PM
 */

namespace app\controllers;


use app\actions\ClassificationsAction;
use app\actions\CreateCaseAction;
use app\actions\GetCasesByClassificationAction;
use yii\filters\AccessControl;
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
                    'actions' => ['classifications', 'cases-by-cl'],
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
            'cases-by-cl' => GetCasesByClassificationAction::className(),
            'classifications' => ClassificationsAction::className(),
        ];
    }
}