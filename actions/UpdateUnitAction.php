<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 3/23/2017
 * Time: 6:03 PM
 */

namespace app\actions;


use app\models\PetCaseUnit;
use yii\base\Action;
use yii\helpers\ArrayHelper;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;

class UpdateUnitAction extends Action
{
    public function run($id)
    {
        $unit = PetCaseUnit::findOne($id);
        if (is_null($unit)) {
            throw new NotFoundHttpException("Case unit $id not found");
        }

        $text = \Yii::$app->request->post('text');

        if (is_null($text)) {
            throw new BadRequestHttpException('parameter "text" required');
        }

        $unit->load(['case_text' => $text]);
        $unit->save();

        return $unit;
    }
}