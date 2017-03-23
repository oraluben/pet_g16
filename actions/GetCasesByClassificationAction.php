<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 3/23/2017
 * Time: 9:42 AM
 */

namespace app\actions;


use app\models\PetCase;
use yii\base\Action;

class GetCasesByClassificationAction extends Action
{
    public function run($cl = null)
    {
        return PetCase::find()->where(['case_classification' => $cl])->all();
    }
}