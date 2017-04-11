<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 3/27/2017
 * Time: 9:56 PM
 */

namespace app\actions;


use app\models\DepartmentFlow;
use app\models\Flow;
use app\models\FunctionFlow;
use app\models\PetCaseUnitImage;
use app\models\PetCaseUnitVideo;
use yii\base\Action;
use yii\web\NotFoundHttpException;

class GetFlowAction extends Action
{
    public function run($id = null, $function = -1, $department = -1)
    {
        if (is_null($flow = Flow::findOne($id))) {
            if (is_null($unit = Flow::findOne(['function' => $function,])) && is_null($unit = Flow::findOne(['department' => $department])))
                throw new NotFoundHttpException("Unit not found.");
        }

        $images = [];
        $videos = [];

        foreach (FlowImage::findAll(['flow' => $flow->id]) as $image) {
            $images[] = \Yii::$app->urlManager->getBaseUrl() . '/imageUploads/' . $image->image_path;
        }

        foreach (PetCaseUnitVideo::findAll(['flow' => $flow->id]) as $video) {
            $videos[] = \Yii::$app->urlManager->getBaseUrl() . '/videoUploads/' . $video->video_path;
        }
        return [
            'flow' => $flow,
            'images' => $images,
            'videos' => $videos,
        ];
    }
}