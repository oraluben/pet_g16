<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * 职能信息
 *
 * @property integer $id
 * @property string $functions_name
 * @property string $functions_text
 */
class Functions extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'functions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['functions_name'], 'string'],
            [['functions_text'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'functoins_name' => 'Function Name',
            'functions_text' => 'Function Text',
        ];
    }
}
