<?php

use yii\db\Expression;
use yii\db\Migration;

class m170330_022136_visit_statistic extends Migration
{
    public function up()
    {
        $this->createTable('pet_login_record', [
            'id' => $this->primaryKey(),
            'user' => $this->integer(),
            'time' => $this->timestamp(),
        ]);

        $this->addForeignKey(
            'fk-login_record-user',
            'pet_login_record',
            'user',
            'pet_user',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function down()
    {
        echo "m170330_022136_visit_statistic cannot be reverted.\n";

        return false;
    }
}
