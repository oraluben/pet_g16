<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * 病例Model, 不保存实际信息，用于保存病例之间的关系
 *
 * @property integer $id
 * @property string $case_name
 *
 * @property PetCaseUnit[] $petCaseUnits
 */
class PetCase extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pet_case';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['case_name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'case_name' => 'Case Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPetCaseUnits()
    {
        return $this->hasMany(PetCaseUnit::className(), ['parent' => 'id']);
    }
}
