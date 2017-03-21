<?php
/**
 * Created by PhpStorm.
 * User: 强
 * Date: 2017/3/14
 * Time: 16:29
 */

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class FilesUploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $Files;

    public function rules()
    {
        return [
            [['Files'], 'file', 'skipOnEmpty' => false, 'extensions' => '*', 'maxFiles' => 10],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->Files as $file) {
                $file->saveAs('./uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}