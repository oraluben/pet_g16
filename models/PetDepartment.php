<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pet_department".
 *
 * @property integer $id
 * @property string $department_name
 * @property string $department_desc
 */
class PetDepartment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pet_department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['department_desc'], 'string'],
            [['department_name'], 'string', 'max' => 20],
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
            'department_desc' => 'Department Desc',
        ];
    }
}
