<?php

namespace app\models;

use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "pet_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $user_type
 */
class User extends ActiveRecord implements IdentityInterface
{
    public function behaviors()
    {
        return [
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'password',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'password',
                ],
                'value' => function ($event) {
                    return \Yii::$app->security->generatePasswordHash($this->password);
                },
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pet_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['user_type'], 'integer'],
            [['username'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 64],
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'user_type' => 'User Type',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return self::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return null;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return false;
    }

    public function validatePassword($pw)
    {
        return \Yii::$app->security->validatePassword($pw, $this->password);
    }

    public function login($duration = 0)
    {
        return \Yii::$app->user->login($this, $duration);
    }

    public function create()
    {
        assert($this->isNewRecord);
        return $this->save();
    }
}
