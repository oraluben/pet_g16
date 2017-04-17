<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pet_case_unit_video".
 *
 * @property integer $id
 ** @property string $video_path
 * @property string $video_info
 * @property integer $pet_case_unit
 * @property string $md5
 *
 * @property PetCaseUnit $petCaseUnit
 */
class PetCaseUnitVideo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pet_case_unit_video';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['video_path'], 'string'],
            [['video_info'], 'string'],
            [['pet_case_unit'], 'integer'],
            [['pet_case_unit'], 'exist', 'skipOnError' => true, 'targetClass' => PetCaseUnit::className(), 'targetAttribute' => ['pet_case_unit' => 'id']],
//            [['md5'], 'string'],
//            [['md5'], 'exist', 'skipOnError' => true, 'targetClass' => PetCaseUnitVideo::className(), 'targetAttribute' => ['md5' => 'md5']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'video_path' => 'Video Path',
            'video_info' => 'Video Info',
            'pet_case_unit' => 'Pet Case Unit',
//            'md5' => 'MD5',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPetCaseUnit()
    {
        return $this->hasOne(PetCaseUnit::className(), ['id' => 'pet_case_unit']);
    }

    public static function cleanup($unit_id)
    {
        PetCaseUnitVideo::deleteAll(['pet_case_unit' => $unit_id]);
    }
}
