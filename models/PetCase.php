<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * 病例Model, 不保存实际信息，用于保存病例之间的关系
 *
 * @property integer $id
 * @property string $case_name
 * @property integer $case_classification
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
            [['case_name'], 'string'],
            [['case_classification'], 'integer'],
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
            'case_classification' => 'Case Classification',
        ];
    }

    /**
     * @inheritdoc
     */
    public function fields()
    {
        $fields = parent::fields();

        $fields['units'] = function () {
            $units = [];
            foreach ($this->petCaseUnits as $unit) {
                $units[] = $unit->toArray();
            }
            return $units;
        };

        return $fields;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPetCaseUnits()
    {
        return $this->hasMany(PetCaseUnit::className(), ['parent' => 'id']);
    }
}
