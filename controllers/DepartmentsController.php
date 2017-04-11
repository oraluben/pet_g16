<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 4/11/2017
 * Time: 1:47 PM
 */

namespace app\controllers;


use app\actions\ActionDepartments;
use app\actions\ActionPetActions;
use yii\filters\AccessControl;
use yii\rest\Controller;

class DepartmentsController extends Controller
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
                    'actions' => ['departments','actions'],
                    'verbs' => ['GET'],
                ],
            ],
        ];

        return $behaviors;
    }

    public function actions()
    {
        return [
            'departments' => ActionDepartments::className(),
            'actions' => ActionPetActions::className(),
        ];
    }
}