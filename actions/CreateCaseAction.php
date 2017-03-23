<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 3/21/2017
 * Time: 3:17 PM
 */

namespace app\actions;


use app\models\PetCase;
use app\models\PetCaseUnit;
use yii\base\Action;

class CreateCaseAction extends Action
{
    public function run()
    {
        $c = new PetCase();

        $case_data = \Yii::$app->request->post();
        $c->load($case_data, '');

        $c->save();

        foreach (PetCaseUnit::TYPE_MAP as $v => $_) {
            $u = new PetCaseUnit();
            $u->parent = $c->id;
            $u->unit_type = $v;
            $u->save();
        }

        return $c->id;
    }
}