<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 4/11/2017
 * Time: 1:49 PM
 */

namespace app\actions;


use app\models\PetAction;
use yii\base\Action;

class ActionPetActions extends Action
{
    public function run($dep_id = null, $user_type = null)
    {
        $q = PetAction::find();
        if (!is_null($dep_id))
            $q->andWhere(['department_id' => $dep_id]);
        if (!is_null($user_type))
            $q->andWhere(['action_user_type' => $user_type]);
        return $q->all();
    }
}