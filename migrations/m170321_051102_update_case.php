<?php

use yii\db\Migration;

class m170321_051102_update_case extends Migration
{
    public function up()
    {
        $this->addColumn('pet_case_unit', 'case_text', $this->text());

        $this->createTable('pet_case_unit_image', [
            'id' => $this->primaryKey(),
            'image_info' => $this->text(),
            'pet_case_unit' => $this->integer()->null(),
        ]);

        $this->createTable('pet_case_unit_video', [
            'id' => $this->primaryKey(),
            'video_info' => $this->text(),
            'pet_case_unit' => $this->integer()->null(),
        ]);

        $this->addForeignKey(
            'fk-case_unit_image-case_unit_id',
            'pet_case_unit_image',
            'pet_case_unit',
            'pet_case_unit',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-case_unit_video-case_unit_id',
            'pet_case_unit_video',
            'pet_case_unit',
            'pet_case_unit',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function down()
    {
        echo "m170321_051102_update_case cannot be reverted.\n";

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
