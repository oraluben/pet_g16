<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 3/28/2017
 * Time: 2:58 PM
 */

namespace app\actions;


use app\models\PetCase;
use yii\base\Action;
use yii\web\NotFoundHttpException;

class UpdateCaseAction extends Action
{
    public function run($id)
    {
        /** @var PetCase $case */
        $case = PetCase::findOne($id);
        if (is_null($case)) {
            throw new NotFoundHttpException("Case ID $id not found.");
        }

        $case->load(\Yii::$app->request->post(), '');
        $case->save();

        return $case;
    }
}