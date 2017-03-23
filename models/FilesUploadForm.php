<?php
/**
 * Created by PhpStorm.
 * User: 强
 * Date: 2017/3/14
 * Time: 16:29
 */

namespace app\models;

use yii\base\Model;

class UploadForm extends Model
{
    public $tmpFilePath;
    public $desFilePath;
    public $type;

    public function rules()
    {
        return [
            [['tmpFilePath', 'desFilePath','type'], 'required'],
            [['tmpFilePath'], 'string'],
            [['desFilePath'], 'string'],
            [['type'], 'string'],
        ];
    }

    public function upload()
    {
        $folder = 'uploads/';
        if ($this->validate()) {
            $desFilePath = $folder.$this->desFilePath;
            if (file_exists($desFilePath))
            {
                unlink($desFilePath);
                return false;
            }
            else
            {
                move_uploaded_file($this->tmpFilePath, $desFilePath);
                return $desFilePath;
            }
        }
    }
}