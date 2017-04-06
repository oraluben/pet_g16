<?php
/**
 * Created by PhpStorm.
 * User: 强
 * Date: 2017/3/23
 * Time: 15:17
 */

namespace app\actions;

use app\models\VideoUploadModel;
use app\models\PetCaseUnit;
use yii\base\Action;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class VideoUploadAction extends Action
{
    public function run($unit_id)
    {
        $unit = PetCaseUnit::findOne($unit_id);
        if (is_null($unit)) {
            throw new NotFoundHttpException("Unit ID $unit_id not found!");
        }

        $files = new VideoUploadModel();
        $files->videoFiles = UploadedFile::getInstancesByName('videoFiles');

        if ($files->upload($unit)) {
            return true;
        } else {
            throw new BadRequestHttpException(json_encode($files->errors));
        }
    }
}
