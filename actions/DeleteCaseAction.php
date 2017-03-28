<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 3/27/2017
 * Time: 7:57 PM
 */

namespace app\actions;


use app\models\PetCase;
use app\models\PetCaseUnitImage;
use yii\base\Action;
use yii\web\NotFoundHttpException;

class DeleteCaseAction extends Action
{
    public function run($id)
    {
        /** @var PetCase $case */
        $case = PetCase::findOne($id);
        if (is_null($case)) {
            throw new NotFoundHttpException("Case ID $id not found.");
        }

        foreach ($case->petCaseUnits as $u) {
            PetCaseUnitImage::cleanup($u->id);
            $u->delete();
        }
        $case->delete();
    }
}