<?php

namespace app\models;


/**
 * This is the model class for table "flow_image".
 *
 * @property integer $id
 * @property string $image_path
 * @property string $image_info
 * @property integer $flow
 *
 */
class FlowImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flow_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['flow'], 'integer'],
            [['flow'], 'exist', 'skipOnError' => true, 'targetClass' => Flow::className(), 'targetAttribute' => ['flow' => 'id']],
            [['image_path'], 'string'],
            [['image_info'], 'string'],
           ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image_path' => 'Image Path',
            'image_info' => 'Image Info',
            'flow' => 'Flow',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlow()
    {
        return $this->hasOne(Flow::className(), ['id' => 'flow']);
    }

    /**
     * delete images related to given unit id
     * @param $unit_id
     */
    public static function cleanup($unit_id)
    {
        FlowImage::deleteAll(['flow' => $unit_id]);
    }
}
