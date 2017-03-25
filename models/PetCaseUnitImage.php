<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pet_case_unit_image".
 *
 * @property integer $id
 * @property integer $image_path
 * @property string $image_info
 * @property integer $pet_case_unit
 *
 * @property PetCaseUnit $petCaseUnit
 */
class PetCaseUnitImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pet_case_unit_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image_path'], 'string'],
            [['image_info'], 'string'],
            [['pet_case_unit'], 'integer'],
            [['pet_case_unit'], 'exist', 'skipOnError' => true, 'targetClass' => PetCaseUnit::className(), 'targetAttribute' => ['pet_case_unit' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image_path' => 'Image Path',
            'image_info' => 'Image Info',
            'pet_case_unit' => 'Pet Case Unit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPetCaseUnit()
    {
        return $this->hasOne(PetCaseUnit::className(), ['id' => 'pet_case_unit']);
    }
}
