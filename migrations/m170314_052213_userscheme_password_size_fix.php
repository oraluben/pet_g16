<?php

use yii\db\Migration;

class m170314_052213_userscheme_password_size_fix extends Migration
{
    public function up()
    {
        $this->alterColumn('pet_user', 'password', $this->string(60));
    }

    public function down()
    {
        echo "m170314_052213_userscheme_password_size_fix cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
