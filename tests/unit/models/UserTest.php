<?php
namespace tests\models;

use app\models\User;

class UserTest extends \Codeception\Test\Unit
{

    private $test_username;
    private $test_password;

    /**
     * @var User
     */
    private $test_user;

    protected function _before()
    {
        while (!is_null(User::findOne([
            'username' => $this->test_username = \Yii::$app->security->generateRandomString(12),
        ]))) {
        }
        $this->test_password = \Yii::$app->security->generateRandomKey(16);
        $this->test_user = new User();
        $this->test_user->load(['username' => $this->test_username, 'password' => $this->test_password], '');
        expect($this->test_user->save())->true();
    }

    protected function _after()
    {
        expect(User::getUser($this->test_username)->delete())->equals(1);
    }

    public function testValidatePassword()
    {
        expect($this->test_user->password)->notEquals($this->test_password);
        expect($this->test_user->validatePassword($this->test_password))->true();
    }

    public function testChangePassword()
    {
        $new_password = \Yii::$app->security->generateRandomKey(16);
        $this->test_user->password = $new_password;
        expect($this->test_user->save())->true();
        expect($this->test_user->password)->notEquals($new_password);
        expect($this->test_user->validatePassword($new_password))->true();
    }
}
