<?php

use yii\db\Migration;

class m170411_063222_create_flow_department extends Migration
{
    public function up()
    {
        $this->createTable('flow', [
            'id' => $this->primaryKey(),
            'flow_name' => $this->text(),
            'flow_text' => $this->text(),
            'function' => $this->integer()->notNull()->defaultValue(-1),
            'department' => $this->integer()->notNull()->defaultValue(-1),
        ]);
        $this->createTable('flow_image', [
            'id' => $this->primaryKey(),
            'image_path' => $this->text(),
            'image_info' => $this->text(),
            'flow' => $this->integer()->notNull()->defaultValue(-1),
        ]);
        $this->createTable('flow_video', [
            'id' => $this->primaryKey(),
            'video_path' => $this->text(),
            'video_info' => $this->text(),
            'flow' => $this->integer()->notNull()->defaultValue(-1),
        ]);
        $this->createTable('department', [
            'id' => $this->primaryKey(),
            'department_name' => $this->text(),
            'department_text' => $this->text(),
        ]);
        $this->createTable('functions', [
            'id' => $this->primaryKey(),
            'function_name' => $this->text(),
            'function_text' => $this->text(),
        ]);


        $this->addForeignKey(
            'fk-function-functions_id',
            'flow',
            'function',
            'functions',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-department-department_id',
            'flow',
            'department',
            'department',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-iflow-flow_id',
            'flow_image',
            'flow',
            'flow',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-vflow-flow_id',
            'flow_video',
            'flow',
            'flow',
            'id',
            'CASCADE',
            'CASCADE'
        );

    }

    public function down()
    {
        echo "m170411_063222_create_flow_department cannot be reverted.\n";

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
