<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 2/28/2017
 * Time: 2:39 PM
 */

namespace app\controllers;

use app\actions\ActionChangePassword;
use app\actions\LoginAction;
use app\actions\RegisterAction;
use app\models\PetCase;
use app\models\PetCaseClassification;
use app\models\User;
use app\models\UserLoginForm;
use yii\db\Query;
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
//                    'roles' => ['?'],
                    'verbs' => ['POST'],
                ],
                [
                    'allow' => true,
                    'actions' => ['register', 'change_password'],
//                    'roles' => ['?'],
                    'verbs' => ['POST'],
                ],
                [
                    'allow' => true,
                    'actions' => ['current-user', 'stat'],
                    'verbs' => ['GET'],
                ],
                [
                    'allow' => true,
                    'actions' => ['logout'],
                    'roles' => ['@'],
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
            'register' => RegisterAction::className(),
            'change_password' => ActionChangePassword::className(),
        ];
    }

    public function actionCurrentUser()
    {
        return \Yii::$app->user->isGuest ? false : \Yii::$app->user->identity->username;
    }

    public function actionLogout()
    {
        return \Yii::$app->user->logout();
    }

    public function actionStat()
    {
        return [
            'case' => PetCase::find()->count(),
            'classification' => PetCaseClassification::find()->count(),
            'user' => User::find()->count(),
            'visit' => 0, // todo
        ];
    }
}