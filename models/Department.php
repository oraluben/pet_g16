<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * 科室信息
 *
 * @property integer $id
 * @property string $department_name
 * @property string $department_text
 */
class Department extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['department_name'], 'string'],
            [['department_text'], 'string'],
            ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'department_name' => 'Department Name',
            'department_text' => 'Department Text',
        ];
    }
}
