<?php

use yii\db\Migration;

class m170325_090549_add_first_user extends Migration
{
    public function up()
    {
        if (\app\models\User::find()->count() == 0) {
            $user = new \app\models\User();
            $user->username = 'admin';
            $user->password = 'admin';
            $user->user_type = \app\models\User::TYPE_ADMIN;
            $user->save();
        }
    }

    public function down()
    {
        echo "m170325_090549_add_first_user cannot be reverted.\n";

        return false;
    }
}
