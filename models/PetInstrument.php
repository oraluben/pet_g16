<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pet_instrument".
 *
 * @property integer $id
 * @property string $instrument_name
 * @property string $instrument_desc
 *
 * @property PetInstrumentMap[] $petInstrumentMaps
 */
class PetInstrument extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pet_instrument';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['instrument_desc'], 'string'],
            [['instrument_name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'instrument_name' => 'Instrument Name',
            'instrument_desc' => 'Instrument Desc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPetInstrumentMaps()
    {
        return $this->hasMany(PetInstrumentMap::className(), ['instrument_id' => 'id']);
    }
}
