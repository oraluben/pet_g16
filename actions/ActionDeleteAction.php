<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 4/16/2017
 * Time: 10:20 PM
 */

namespace app\actions;


use app\models\PetAction;
use yii\base\Action;

class ActionDeleteAction extends Action
{
    public function run($id)
    {
        return PetAction::deleteAll(['id' => $id]);
    }
}