<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pet_instrument_map".
 *
 * @property integer $id
 * @property integer $instrument_id
 * @property integer $action_id
 *
 * @property PetAction $action
 * @property PetInstrument $instrument
 */
class PetInstrumentMap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pet_instrument_map';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['instrument_id', 'action_id'], 'integer'],
            [['action_id'], 'exist', 'skipOnError' => true, 'targetClass' => PetAction::className(), 'targetAttribute' => ['action_id' => 'id']],
            [['instrument_id'], 'exist', 'skipOnError' => true, 'targetClass' => PetInstrument::className(), 'targetAttribute' => ['instrument_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'instrument_id' => 'Instrument ID',
            'action_id' => 'Action ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAction()
    {
        return $this->hasOne(PetAction::className(), ['id' => 'action_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstrument()
    {
        return $this->hasOne(PetInstrument::className(), ['id' => 'instrument_id']);
    }
}
