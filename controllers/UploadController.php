<?php
/**
 * Created by PhpStorm.
 * User: 强
 * Date: 2017/3/23
 * Time: 9:18
 */

namespace app\controllers;

use app\actions\ImageUploadAction;
use app\actions\VideoUploadAction;
use app\models\PetCaseUnitImage;
use app\models\PetCaseUnitVideo;
use yii\filters\AccessControl;
use yii\rest\Controller;

class UploadController extends Controller
{

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        unset($behaviors['contentNegotiator']['formats']['application/xml']);

        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'allow' => true,
                    'actions' => ['image', 'video'],
                    'verbs' => ['POST'],
                    'roles' => ['@'],
                ],
                [
                    'allow' => true,
                    'actions' => ['delete-image', 'delete-video', 'delete-all'],
                    'verbs' => ['DELETE'],
                    'roles' => ['@'],
                ],
            ],
        ];

        return $behaviors;
    }

    public function actions()
    {
        return [
            'image' => ImageUploadAction::className(),
            'video' => VideoUploadAction::className(),

        ];
    }

    public function actionDeleteImage($path)
    {
        return PetCaseUnitImage::deleteAll(['image_path' => $path]);
    }

    public function actionDeleteVideo($path)
    {
        return PetCaseUnitVideo::deleteAll(['video_path' => $path]);
    }

    public function actionDeleteAllImage($unit_id)
    {
        return PetCaseUnitImage::cleanup($unit_id);
    }

    public function actionDeleteAllVideo($unit_id)
    {
        return PetCaseUnitVideo::cleanup($unit_id);
    }

    public function actionDeleteAll($unit_id)
    {
        return
            PetCaseUnitImage::cleanup($unit_id) +
            PetCaseUnitVideo::cleanup($unit_id);
    }
}