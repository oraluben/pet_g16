<?php

use yii\db\Migration;

class m170309_023453_userscheme_varchar_fix extends Migration
{
    public function up()
    {
        $this->alterColumn('pet_user', 'username', $this->string(20));
        $this->alterColumn('pet_user', 'password', $this->string(64));
    }

    public function down()
    {
        $this->alterColumn('pet_user', 'username', $this->char(20));
        $this->alterColumn('pet_user', 'password', $this->char(64));
    }
}
