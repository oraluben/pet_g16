<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * 流程信息
 *
 * @property integer $id
 * @property string $flow_name
 * @property string $flow_text
 * @property integer $function
 * @property integer $department
 */
class Flow extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flow';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['flow_name'], 'string'],
            [['flow_text'], 'string'],
            [['function'], 'integer'],
            [['function'], 'exist', 'skipOnError' => true, 'targetClass' => Functions::className(), 'targetAttribute' => ['function' => 'id']],
            [['department'], 'integer'],
            [['department'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'flow_name' => 'Flow Name',
            'flow_text' => 'Flow Text',
            'function' => 'Function',
            'department' => 'Department',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(PetCase::className(), ['id' => 'department']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFunction()
    {
        return $this->hasOne(Functions::className(), ['id' => 'function']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(FlowImage::className(), ['id' => 'flow']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideos()
    {
        return $this->hasMany(FLOWVideo::className(), ['id' => 'flow']);
    }
}
