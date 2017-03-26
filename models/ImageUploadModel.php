<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 3/25/2017
 * Time: 7:00 PM
 */

namespace app\models;


use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

class ImageUploadModel extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 0],
        ];
    }

    /**
     * @param PetCaseUnit $unit
     * @return bool
     */
    public function upload($unit)
    {
        if ($this->validate()) {
            $post = \Yii::$app->request->post('imageInfo', []);
            foreach ($this->imageFiles as $k => $file) {
                $f_name = $file->baseName . '_' . \Yii::$app->security->generateRandomString(12) . '.' . $file->extension;
                if ($file->saveAs('imageUploads/' . $f_name)) {
                    $image_record = new PetCaseUnitImage();
                    $image_record->image_path = $f_name;
                    $image_record->pet_case_unit = $unit->id;
                    $image_record->image_info = ArrayHelper::getValue($post, $k);
                    $image_record->save();
                }
            }
            return true;
        } else {
            return false;
        }
    }
}