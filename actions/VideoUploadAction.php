<?php
/**
 * Created by PhpStorm.
 * User: 强
 * Date: 2017/3/23
 * Time: 15:17
 */

namespace app\actions;

use app\models\PetCaseUnitVideo;
use yii\base\Action;
use Yii;

class VideoUploadAction extends Action
{
    public function run()
    {
        if (!Yii::$app->request->isPost) {
            return [
                "success" => false,
                "message" => "上传失败"];
        }
        $count = $_POST["count"];
        $folder = 'videoUploads/';
        $videoType = array("video/x-msvideo", "video/mp4", "video/mpeg");
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
                if (!in_array($type, $videoType)) {
                    $success = false;
                    $msg = "文件" . $fileName . "格式错误";
                } else {
                    $video = new PetCaseUnitVideo();
                    $tmpFilePath = $_FILES["file" . $i]["tmp_name"];
                    $desFilePath = $folder . $fileName;
                    $totalSize = $_POST['totalSize'];
                    $isLastChunk = $_POST['isLastChunk'];
                    $uploadOrder = $_POST['uploadOrder'];
                    $video->video_path = $desFilePath;
                    $video->video_info = $_POST["video_info" . $i];
                    $video->pet_case_unit = $_POST["pet_case_unit"];
                    if ($uploadOrder == 0 && file_exists($desFilePath) && filesize($desFilePath) == $totalSize) {
                        unlink($desFilePath);
                        $success = false;
                        $msg = "视频" . $fileName . "重复上传";
                    }
                    if ($uploadOrder == 0 &&!$video->save()) {
                        $success = false;
                        $msg = "视频" . $fileName . "无效";
                    }
                    if (!file_put_contents($desFilePath, file_get_contents($tmpFilePath), FILE_APPEND)) {
                        $success = false;
                        $msg = "视频" . $fileName . "块" . $uploadOrder . "续传失败";
                    } else if ($isLastChunk) {
                       if (filesize('./upload/'. $fileName) != $totalSize) {
                            $success = false;
                            $msg = "视频" . $fileName . "未完整上传";
                       } else {
                            if ($success) {
                                $msg = "视频" . $fileName . "上传成功";
                            }
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
