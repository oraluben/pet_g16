<?php
/**
 * Created by PhpStorm.
 * User: 强
 * Date: 2017/3/14
 * Time: 16:32
 */

namespace app\actions;

use app\models\PetCaseUnitImage;
use yii\base\Action;
use Yii;

class ImageUploadAction extends Action
{
    public function run()
    {
        if (Yii::$app->request->isPost) {
            $count = $_POST["count"];
            $folder = 'imageUploads/';
            $imageType = array("image/png", "image/jpg", "image/jpeg");
            for ($i = 0; $i < $count; $i++) {
                $image = new PetCaseUnitImage();
                $tmpFilePath = $_FILES["file" . $i]["tmp_name"];
                $desFilePath = $folder . $_FILES["file" . $i]["name"];
                $type = $_FILES["file" . $i]["type"];
                if (in_array($type, $imageType)) {
                    if (file_exists($desFilePath)) {
                        unlink($desFilePath);
                        return [
                            'success' => false,
                            'message' => '图片' . $desFilePath . '重复上传'];
                    } else {
                        $image->image_path = $desFilePath;
                        $image->image_info = $_POST["image_info".$i];
                        $image->pet_case_unit = $_POST["pet_case_unit"];
                        if ($image->save()) {
                            move_uploaded_file($tmpFilePath, $desFilePath);
                        } else {
                            return [
                                'success' => false,
                                'message' => '图片' . $desFilePath . '无效'];
                        }
                    }
                } else {
                    return [
                        'success' => false,
                        'message' => '图片' . $desFilePath . '格式错误'];
                }
            }
            return [
                'success' => true,
                'message' => '上传成功'];
        } else {
            return [
                'success' => false,
                'message' => '上传失败'];
        }
    }
}