<?php

use yii\db\Migration;

class m170223_004149_base extends Migration
{
    public function up()
    {
        $this->createTable('pet_user', [
            'id' => $this->primaryKey(),
            'username' => $this->char(20)->notNull(),
            'password' => $this->char(64)->notNull(),
            'user_type' => $this->integer()->notNull(),
        ]);
        $this->createTable('pet_case', [
            'id' => $this->primaryKey(),
            'case_name' => $this->text(),
        ]);
        $this->createTable('pet_case_unit', [
            'id' => $this->primaryKey(),
            'parent' => $this->integer()->null(),
        ]);

        $this->addForeignKey(
            'fk-case_unit-case_id',
            'pet_case_unit',
            'parent',
            'pet_case',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey('fk-case_unit-case_id', 'pet_case_unit');

        $this->dropTable('pet_case_unit');
        $this->dropTable('pet_case');
        $this->dropTable('pet_user');

        return true;
    }
}
