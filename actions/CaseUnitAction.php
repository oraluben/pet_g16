<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 3/27/2017
 * Time: 9:56 PM
 */

namespace app\actions;


use app\models\PetCaseUnit;
use app\models\PetCaseUnitImage;
use app\models\PetCaseUnitVideo;
use yii\base\Action;
use yii\web\NotFoundHttpException;

class CaseUnitAction extends Action
{
    public function run($unit_id = null, $parent = null, $unit_type = null)
    {
        if (is_null($unit = PetCaseUnit::findOne($unit_id))) {
            if (is_null($unit = PetCaseUnit::findOne(['parent' => $parent, 'unit_type' => $unit_type])))

                throw new NotFoundHttpException("Unit not found.");
        }

        $images = [];
        $videos = [];

        foreach ($unit->images as $image) {
            /** @var PetCaseUnitImage $image */
            $images[] = \Yii::$app->urlManager->getBaseUrl() . '/imageUploads/' . $image->image_path;
        }
        foreach ($unit->videos as $video) {
            /** @var PetCaseUnitVideo $video */
            $videos[] = \Yii::$app->urlManager->getBaseUrl() . '/videoUploads/' . $video->video_path;
        }
        return [
            'unit' => $unit,
            'images' => $images,
            'videos' => $videos,
        ];
    }
}