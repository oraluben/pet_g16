<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 3/14/2017
 * Time: 1:58 PM
 */

namespace app\controllers;


use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'app\models\User';
}