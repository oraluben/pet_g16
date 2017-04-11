<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 3/27/2017
 * Time: 7:57 PM
 */

namespace app\actions;


use app\models\DepartmentFlow;
use app\models\Flow;
use app\models\FunctionFlow;
use app\models\FlowImage;
use yii\base\Action;
use yii\web\NotFoundHttpException;

class DeleteFlowAction extends Action
{
    public function run($id)
    {
        $flow = Flow::findOne($id);
        if (is_null($flow)) {
            throw new NotFoundHttpException("Case ID $id not found.");
        }

        FlowImage::cleanup($id);
        FlowVideo::cleanup($id);
        $flow->delete();
    }
}