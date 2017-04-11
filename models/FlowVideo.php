<?php

namespace app\models;


/**
 * This is the model class for table "flow_video".
 *
 * @property integer $id
 * @property string $video_path
 * @property string $video_info
 * @property integer $flow
 *
 */
class FlowVideo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flow_video';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['flow'], 'integer'],
            [['flow'], 'exist', 'skipOnError' => true, 'targetClass' => Flow::className(), 'targetAttribute' => ['flow' => 'id']],
            [['video_path'], 'string'],
            [['video_info'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'video_path' => 'Video Path',
            'video_info' => 'Video Info',
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
     * delete videos related to given unit id
     * @param $unit_id
     */
    public static function cleanup($unit_id)
    {
        FlowVideo::deleteAll(['flow' => $unit_id]);
    }
}
