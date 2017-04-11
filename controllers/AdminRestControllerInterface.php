<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 4/11/2017
 * Time: 3:20 PM
 */

namespace app\controllers;


use app\models\User;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;

class AdminRestControllerInterface extends ActiveController
{
    public function checkAccess($action, $model = null, $params = [])
    {
        if (\Yii::$app->user->isGuest || \Yii::$app->user->identity->user_type != User::TYPE_ADMIN)
            throw new ForbiddenHttpException();
    }
}