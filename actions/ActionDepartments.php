<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 4/11/2017
 * Time: 1:44 PM
 */

namespace app\actions;

use app\models\PetDepartment;
use yii\base\Action;

class ActionDepartments extends Action
{
    public function run()
    {
        return PetDepartment::find()->all();
    }
}