<?php
/**
 * Created by PhpStorm.
 * User: 强
 * Date: 2017/3/16
 * Time: 10:14
 */

namespace app\models;


class VideosUploadForm extends FilesUploadForm
{
    public $Files;

    public function rules()
    {
        return [
            [['Files, totalSize, isLastTrunk, isFirstUpload'], 'required'],
            [['Files'], 'file', 'skipOnEmpty' => false, 'extensions' => 'mp4, avi', 'maxFiles' => 10],
            [['totalSize'], 'integer'],
            [['isLastTrunk'], 'integer'],
            [['isFirstUpload'], 'integer'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->Files as $file) {
                $fileName = $file->baseName . '.' . $file->extension;
                if ($this->isFirstUpload == '1' && file_exists('./upload/'. $fileName) && filesize('./upload/'. $fileName) == $this->totalSize) {
                    unlink('./upload/'. $fileName);
                }

                if (!file_put_contents('./upload/'. $fileName, file_get_contents($file), FILE_APPEND)) {
                    return false;
                } else {
                    if ($this->isLastChunk === '1') {
                        if (filesize('./upload/'. $fileName) == $this->totalSize) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                    return true;
                }
            }
        } else {
            return false;
        }
    }

    public function getVideoCover($file,$time = '1',$name) {
        $str = "ffmpeg -i ".$file." -y -f mjpeg -ss 3 -t ".$time." -s 320x240 ".$name;
        $result = system($str);
        return $result;
    }

    public function getTime($file){
        $vtime = exec("ffmpeg -i ".$file." 2>&1 | grep 'Duration' | cut -d ' ' -f 4 | sed s/,//");//总长度
        $ctime = date("Y-m-d H:i:s",filectime($file));//创建时间
        return array(
            'vtime'=>$vtime,
            'ctime'=>$ctime
        );
    }
}