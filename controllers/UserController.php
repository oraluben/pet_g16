<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 3/14/2017
 * Time: 1:58 PM
 */

namespace app\controllers;


use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;

class UserController extends ActiveController
{
    public $modelClass = 'app\models\User';

    public function checkAccess($action, $model = null, $params = [])
    {
        if (\Yii::$app->user->isGuest)
            throw new ForbiddenHttpException();
    }

}