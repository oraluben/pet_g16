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
        if (!Yii::$app->request->isPost) {
            return [
                "success" => false,
                "message" => "上传失败"];
        }
        $count = $_POST["count"];
        $folder = 'imageUploads/';
        $imageType = array("image/png", "image/jpg", "image/jpeg");
        $message = [];
        $success = true;
        $msg = "";
        for ($i = 0; $i < $count; $i++) {
            $fileName = $_FILES["file" . $i]["name"];
            switch ($_FILES["file" . $i]["error"]) {
                case 0: {
                    break;
                }
                case 1: {
                    $success = false;
                    $msg = "文件" . $fileName . "大小超过服务器限制";
                    break;
                }
                case 2: {
                    $success = false;
                    $msg = "文件" . $fileName . "大小超过浏览器限制";
                    break;
                }
                case 3: {
                    $success = false;
                    $msg = "文件" . $fileName . "未完整上传";
                    break;
                }
                case 4: {
                    $success = false;
                    $msg = "没有找到上传的文件" . $fileName;
                    break;
                }
                case 5: {
                    $success = false;
                    $msg = "服务器临时文件夹丢失";
                    break;
                }
                case 6: {
                    $success = false;
                    $msg = "文件" . $fileName . "写入到临时文件夹出错";
                    break;
                }
            }
            if (!is_dir($folder) && !mkdir($folder, 0777, true)) {
                $success = false;
                $msg = "找不到" . $folder . "文件夹且创建失败";
            } else {
                $type = $_FILES["file" . $i]["type"];
                if (!in_array($type, $imageType)) {
                    $success = false;
                    $msg = "文件" . $fileName . "格式错误";
                } else {
                    $image = new PetCaseUnitImage();
                    $tmpFilePath = $_FILES["file" . $i]["tmp_name"];
                    $image->image_path = $folder . $fileName;
                    $image->image_info = $_POST["image_info" . $i];
                    $image->pet_case_unit = $_POST["pet_case_unit"];
                    if (PetCaseUnitImage::findOne(['image_path' => $image->image_path]) || file_exists($image->image_path)) {
                        PetCaseUnitImage::deleteAll('image_path = :path',[':path' => $image->image_path]);
                        unlink($image->image_path);
                        $success = false;
                        $msg = "图片" . $fileName . "重复上传";
                    }
                    if (!$image->save()) {
                        $success = false;
                        $msg = "图片" . $fileName . "无效";
                    } else {
                        move_uploaded_file($tmpFilePath, $image->image_path);
                        if ($success) {
                            $msg = "图片" . $fileName . "上传成功";
                        }
                    }
                }
            }
            array_push($message, [
                "success" => $success,
                "message" => $msg]);
        }
        return $message;
    }
}