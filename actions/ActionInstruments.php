<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 4/11/2017
 * Time: 2:45 PM
 */

namespace app\actions;


use app\models\PetInstrument;
use yii\base\Action;

class ActionInstruments extends Action
{
    public function run($dep_id = null)
    {
        if (is_null($dep_id))
            return PetInstrument::find()->all();
        return PetInstrument::findBySql(
            'SELECT * FROM {{pet_instrument}} WHERE [[id]] IN 
(SELECT {{pet_instrument_map}}.instrument_id FROM {{pet_instrument_map}} INNER JOIN 
{{pet_action}} ON {{pet_action}}.id = {{pet_instrument_map}}.action_id WHERE {{pet_action}}.department_id = :dep_id)',
            [':dep_id' => $dep_id]
        )->all();
    }
}