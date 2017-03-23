<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pet_case_classification".
 *
 * @property integer $id
 * @property string $classification_name
 * @property integer $parent
 *
 * @property PetCase[] $petCases
 * @property PetCaseClassification $parent0
 * @property PetCaseClassification[] $petCaseClassifications
 */
class PetCaseClassification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pet_case_classification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['classification_name'], 'string'],
            [['parent'], 'integer'],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => PetCaseClassification::className(), 'targetAttribute' => ['parent' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'classification_name' => 'Classification Name',
            'parent' => 'Parent',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPetCases()
    {
        return $this->hasMany(PetCase::className(), ['case_classification' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(PetCaseClassification::className(), ['id' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPetCaseClassifications()
    {
        return $this->hasMany(PetCaseClassification::className(), ['parent' => 'id']);
    }
}
