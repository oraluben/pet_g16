<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pet_drug".
 *
 * @property integer $id
 * @property string $drug_name
 * @property string $drug_desc
 *
 * @property PetDrugMap[] $petDrugMaps
 */
class PetDrug extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pet_drug';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['drug_desc'], 'string'],
            [['drug_name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'drug_name' => 'Drug Name',
            'drug_desc' => 'Drug Desc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPetDrugMaps()
    {
        return $this->hasMany(PetDrugMap::className(), ['drug_id' => 'id']);
    }
}
