<?php
/**
 * Created by PhpStorm.
 * User: easonyan
 * Date: 2/28/2017
 * Time: 1:31 PM
 */

namespace app\models;


use yii\base\Model;

class UserLoginForm extends Model
{
    var $username;
    var $password;
    var $remember;

    var $_user;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username', 'password'], 'string'],
            [['remember'], 'boolean'],
            ['username', 'exist', 'skipOnError' => true,
                'targetClass' => User::className(),
                'targetAttribute' => 'username'],
            ['password', 'validatePassword', 'when' => function ($model) {
                /** @var self $model */
                return !is_null($model->getUser());
            }],
        ];
    }

    /**
     * @return User | null
     */
    public function getUser()
    {
        if (is_null($this->_user)) {
            $this->_user = User::findOne(['username' => $this->username]);
        }
        return $this->_user;
    }

    public function validatePassword($attribute, $params, $validator)
    {
        if (!$this->getUser()->validatePassword($this->password)) {
            $this->addError('password', 'password is incorrect');
        }
    }

    public function login()
    {
        if ($this->validate()) {
            return $this->getUser()->login();
        } else {
            return false;
        }
    }
}