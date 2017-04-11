<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pet_drug_map".
 *
 * @property integer $id
 * @property integer $drug_id
 * @property integer $action_id
 *
 * @property PetAction $drug
 * @property PetDrug $drug0
 */
class PetDrugMap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pet_drug_map';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['drug_id', 'action_id'], 'integer'],
            [['drug_id'], 'exist', 'skipOnError' => true, 'targetClass' => PetAction::className(), 'targetAttribute' => ['drug_id' => 'id']],
            [['drug_id'], 'exist', 'skipOnError' => true, 'targetClass' => PetDrug::className(), 'targetAttribute' => ['drug_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'drug_id' => 'Drug ID',
            'action_id' => 'Action ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrug()
    {
        return $this->hasOne(PetAction::className(), ['id' => 'drug_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrug0()
    {
        return $this->hasOne(PetDrug::className(), ['id' => 'drug_id']);
    }
}
