<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pet_action".
 *
 * @property integer $id
 * @property integer $action_user_type
 * @property string $action_name
 * @property string $action_desc
 *
 * @property PetDrug[] $petDrugs
 * @property PetInstrument[] $petInstruments
 * @property PetDepartment $petDepartment
 */
class PetAction extends \yii\db\ActiveRecord
{
    CONST USER_FRONT = 0;
    const USER_DOC_ASST = 1;
    const USER_DOCTOR = 2;
    const USER_TYPES = [
        self::USER_FRONT => '前台',
        self::USER_DOC_ASST => '医助',
        self::USER_DOCTOR => '医师',
    ];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pet_action';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['action_user_type'], 'integer'],
            [['action_desc'], 'string'],
            [['action_name'], 'string', 'max' => 20],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => PetDepartment::className(), 'targetAttribute' => ['department_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'action_user_type' => 'Action User Type',
            'action_name' => 'Action Name',
            'action_desc' => 'Action Desc',
        ];
    }


    /**
     * @inheritdoc
     */
    public function fields()
    {
        $f = parent::fields();
        $f['drugs'] = 'petDrugs';
        $f['instruments'] = 'petInstruments';
        $f['department'] = 'petDepartment';

        $f['action_user_type'] = function () {
            return ArrayHelper::getValue(self::USER_TYPES, $this->action_user_type, '');
        };
        return $f;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPetDrugs()
    {
        return $this->hasMany(PetDrug::className(), ['id' => 'drug_id'])
            ->viaTable('pet_drug_map', ['action_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPetInstruments()
    {
        return $this->hasMany(PetInstrument::className(), ['id' => 'action_id'])
            ->viaTable('pet_instrument_map', ['action_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPetDepartment()
    {
        return $this->hasOne(PetDepartment::className(), ['id' => 'department_id']);
    }
}
