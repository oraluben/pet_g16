<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 3/23/2017
 * Time: 10:40 AM
 */

namespace app\actions;


use app\models\PetCase;
use app\models\PetCaseUnit;
use yii\base\Action;
use yii\web\NotFoundHttpException;

class GetCaseByIDAction extends Action
{
    public function run($id)
    {
        /** @var PetCase $case */
        $case = PetCase::findOne($id);

        if (is_null($case)) {
            throw new NotFoundHttpException("Case $id not found.");
        }

        $res = [];
        foreach ($case->petCaseUnits as $unit) {
            $res[] = $unit;
        }

        return $res;
    }
}