<?php
/**
 * Created by PhpStorm.
 * User: 强
 * Date: 2017/3/23
 * Time: 9:18
 */

namespace app\controllers;

use app\actions\UploadAction;
use Yii;
use yii\rest\Controller;

class UploadController extends Controller
{
    public function actions()
    {
        return [
            'upload' => UploadAction::className(),
        ];
    }
}