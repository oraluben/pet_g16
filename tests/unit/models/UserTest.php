<?php
namespace tests\models;

use app\models\User;

class UserTest extends \Codeception\Test\Unit
{
    public function testCreateUser()
    {
        ;
        $password = \Yii::$app->security->generateRandomString(12);
        while ($username = \Yii::$app->security->generateRandomString(6)) {
            if (is_null(User::findOne(['username' => $username]))) break;
        }
        $user = new User();
        $user->load(['username' => $username, 'password' => $password], '');
        expect($user->create())->true();
        expect($user->delete())->equals(1);
    }
}
