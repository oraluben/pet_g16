<?php
/**
 * Created by PhpStorm.
 * User: 强
 * Date: 2017/3/14
 * Time: 16:32
 */

namespace app\actions;

use app\models\UploadForm;
use yii\base\Action;
use Yii;

class UploadAction extends Action {
    public function run() {
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            $count = $_POST["count"];
            for ($i = 0; $i < $count; $i++) {
                $model->tmpFilePath = $_FILES["file".$i]["tmp_name"];
                $model->desFilePath = $_FILES["file".$i]["name"];
                $model->type = $_FILES["file".$i]["type"];
                if (!$model->upload())
                {
                    return [
                        'success' => false,
                        'message' => '文件'.$model->desFilePath.'上传失败',];
                }
            }
            return [
                'success' => true,
                'message' => '上传成功',];
        }
        return [
            'success' => false,
            'message' => '上传失败',];
    }
}