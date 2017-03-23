<?php

use yii\db\Migration;

class m170321_055607_update_case_classification extends Migration
{
    public function up()
    {
        $this->createTable('pet_case_classification', [
            'id' => $this->primaryKey(),
            'classification_name' => $this->text(),
            'parent' => $this->integer()->null(),
        ]);

        $this->addForeignKey(
            'fk-pet_case_classification-pet_case_classification_parent',
            'pet_case_classification',
            'parent',
            'pet_case_classification',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addColumn('pet_case', 'case_classification', $this->integer()->null());

        $this->addForeignKey(
            'fk-pet_case-pet_case_classification',
            'pet_case',
            'case_classification',
            'pet_case_classification',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function down()
    {
        echo "m170321_055607_update_case_classification cannot be reverted.\n";

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
