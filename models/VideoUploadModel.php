<?php
/**
 * Created by PhpStorm.
 * User: 强
 * Date: 2017/3/28
 * Time: 14:55
 */

namespace app\models;


use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

class VideoUploadModel extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $videoFiles;

    public function rules()
    {
        return [
            [['videoFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'avi, mp4', 'maxFiles' => 0
                , 'maxSize' => null],
        ];
    }

    /**
     * @param PetCaseUnit $unit
     * @return bool
     */
    public function upload($unit)
    {
        if ($this->validate()) {
            $post = \Yii::$app->request->post('videoInfo', []);
            foreach ($this->videoFiles as $k => $file) {
                $f_name = $file->baseName . '_' . \Yii::$app->security->generateRandomString(12) . '.' . $file->extension;
                if ($file->saveAs('videoUploads/' . $f_name)) {
                    $video_record = new PetCaseUnitVideo();
                    $video_record->video_path = $f_name;
                    $video_record->pet_case_unit = $unit->id;
                    $video_record->video_info = ArrayHelper::getValue($post, $k);
//                    $video_record->md5 = md5_file('videoUploads/' . $f_name);
                    $video_record->save();
                }
            }
            return true;
        } else {
            return false;
        }
    }
}