<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 2/28/2017
 * Time: 2:39 PM
 */

namespace app\controllers;

use app\actions\LoginAction;
use app\models\UserLoginForm;
use yii\filters\AccessControl;
use yii\rest\Controller;

class ApiController extends Controller
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
                    'actions' => ['login'],
                    'roles' => ['?'],
                    'verbs' => ['POST'],
                ],
            ],
        ];

        return $behaviors;
    }

    public function actions()
    {
        return [
            'login' => LoginAction::className(),
        ];
    }
}