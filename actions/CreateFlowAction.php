<?php

namespace app\actions;

use app\models\DepartmentFlow;
use app\models\Flow;
use app\models\FunctionFlow;
use yii\base\Action;

class CreateFlowAction extends Action
{
    public function run()
    {
        $flow = new Flow();

        $flow_data = \Yii::$app->request->post();
        $flow->load($flow_data, '');

        $flow->save();

        return $flow->id;
    }
}