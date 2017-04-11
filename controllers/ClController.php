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

class ClController extends AdminRestControllerInterface
{
    public $modelClass = 'app\models\PetCaseClassification';
}