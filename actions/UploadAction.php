<?php
/**
 * Created by PhpStorm.
 * User: 强
 * Date: 2017/3/14
 * Time: 16:32
 */

namespace app\actions;

use app\models\FilesUploadForm;
use yii\base\Action;
use yii\web\ForbiddenHttpException;

class UploadAction extends Action {
    public function run()
    {
        $model = new FilesUploadForm();

        if (Yii::$app->request->isPost) {
            $model->Files = UploadedFile::getInstances($model, 'Files');
            if ($model->upload()) {
                // 文件上传成功
                return [
                    'success' => true,
                    'message' => '操作成功',
                    'model' => $model,
                ];
            }
        }
        throw new ForbiddenHttpException(json_encode([
            'success' => false,
            'message' => '操作失败',
            'errors' => $model->errors,
        ]));
    }
}