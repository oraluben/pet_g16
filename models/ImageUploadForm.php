<?php
/**
 * Created by PhpStorm.
 * User: 强
 * Date: 2017/3/16
 * Time: 10:10
 */

namespace app\models;


class ImageUploadForm extends FilesUploadForm
{
    /**
     * @var UploadedFile[]
     */
    public function rules()
    {
        return [
            [['tmpFilePath', 'desFilePath','type'], 'required'],
            [['tmpFilePath'], 'string'],
            [['desFilePath'], 'string'],
            [['type'], 'in','range' => ['image/png', 'image/jpg', 'image/jpeg']],
        ];
    }
}