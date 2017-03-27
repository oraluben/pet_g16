<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 3/27/2017
 * Time: 7:19 PM
 */

namespace app\controllers;


use app\models\User;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;

class ClController extends ActiveController
{
    public $modelClass = 'app\models\PetCaseClassification';

    public function checkAccess($action, $model = null, $params = [])
    {
        if (\Yii::$app->user->isGuest || \Yii::$app->user->identity->user_type != User::TYPE_ADMIN)
            throw new ForbiddenHttpException();
    }
}