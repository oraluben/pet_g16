<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 3/21/2017
 * Time: 3:16 PM
 */

namespace app\controllers;

use app\actions\CreateFlowAction;
use app\actions\DeleteFlowAction;
use app\actions\UpdateFlowAction;
use app\actions\GetFlowAction;
use yii\filters\AccessControl;
use yii\rest\Controller;

class FlowController extends Controller
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
                    'actions' => ['create', 'update'],
                    'verbs' => ['POST'],
                ],
                [
                    'allow' => true,
                    'actions' => ['get'],
                    'verbs' => ['GET'],
                ],
                [
                    'allow' => true,
                    'actions' => ['delete'],
                    'verbs' => ['DELETE'],
                ],
            ],
        ];

        return $behaviors;
    }

    public function actions()
    {
        return [
            'create' => CreateFlowAction::className(),
            'delete' => DeleteFlowAction::className(),
            'update' => UpdateFlowAction::className(),
            'get' => GetFlowAction::className(),
        ];
    }
}