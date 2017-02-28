<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * 病例的具体信息
 *
 * @property integer $id
 * @property integer $parent
 *
 * @property PetCase $parent_case
 */
class PetCaseUnit extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pet_case_unit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent'], 'integer'],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => PetCase::className(), 'targetAttribute' => ['parent' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent' => 'Parent',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentCase()
    {
        return $this->hasOne(PetCase::className(), ['id' => 'parent']);
    }
}
