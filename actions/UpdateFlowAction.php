<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 3/23/2017
 * Time: 6:03 PM
 */

namespace app\actions;


use app\models\Flow;
use yii\base\Action;
use yii\web\NotFoundHttpException;

class UpdateFlowAction extends Action
{
    public function run($id)
    {
        $flow = Flow::findOne($id);
        if (is_null($flow)) {
            throw new NotFoundHttpException("Case unit $id not found");
        }

        DeleteFlowAction.run($id);
        $flow_id = CreateFlowAction.run();

        return $flow_id;
    }
}