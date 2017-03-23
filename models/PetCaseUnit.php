<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * 病例的具体信息
 *
 * @property integer $id
 * @property integer $parent
 * @property integer $unit_type
 *
 * @property PetCase $parent_case
 * @property PetCaseUnitImage $images
 */
class PetCaseUnit extends ActiveRecord
{
    const TYPE_DISEASE_NAME = 0;
    const TYPE_ADMISSION = 1;
    const TYPE_CHECK = 2;
    const TYPE_CHECK_RESULT = 3;
    const TYPE_TREATMENT_PROGRAMS = 4;
    const TYPE_MAP = [
        self::TYPE_DISEASE_NAME => "疾病名称",
        self::TYPE_ADMISSION => "接诊",
        self::TYPE_CHECK => "病例检查",
        self::TYPE_CHECK_RESULT => "诊断结果",
        self::TYPE_TREATMENT_PROGRAMS => "治疗方案",
    ];

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
            ['unit_type', 'unique', 'targetAttribute' => ['parent', 'unit_type']],
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
            'unit_type' => 'Unit type',
        ];
    }

    public function fields()
    {
        $fields = parent::fields();

        $fields['unit_type'] = function () {
            return self::TYPE_MAP[$this->unit_type];
        };

        return $fields;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentCase()
    {
        return $this->hasOne(PetCase::className(), ['id' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(PetCaseUnitImage::className(), ['id' => 'pet_case_unit']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideos()
    {
        return $this->hasMany(PetCaseUnitVideo::className(), ['id' => 'pet_case_unit']);
    }
}
