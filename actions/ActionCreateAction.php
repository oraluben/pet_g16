<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 4/15/2017
 * Time: 8:35 PM
 */

namespace app\actions;


use app\models\PetAction;
use app\models\PetDrugMap;
use app\models\PetInstrumentMap;
use yii\base\Action;

class ActionCreateAction extends Action
{
    public function run()
    {
        $action = new PetAction();
        $action->load([
            'action_user_type' => \Yii::$app->request->post('action_user_type'),
            'action_name' => \Yii::$app->request->post('action_name'),
            'action_desc' => \Yii::$app->request->post('action_desc'),
            'department_id' => \Yii::$app->request->post('department_id'),
        ], '');
        $action->save();

        foreach (\Yii::$app->request->post('drugs', []) as $d) {
            $m = new PetDrugMap();
            $m->load([
                'drug_id' => $d,
                'action_id' => $action->id,
            ], '');
            $m->save();
        }

        foreach (\Yii::$app->request->post('instruments', []) as $i) {
            $m = new PetInstrumentMap();
            $m->load([
                'instrument_id' => $i,
                'action_id' => $action->id,
            ], '');
            $m->save();
        }

        return $action;
    }
}