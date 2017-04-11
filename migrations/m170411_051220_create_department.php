<?php

use yii\db\Migration;

class m170411_051220_create_department extends Migration
{
    public function up()
    {
        $this->createTable('pet_department', [
            'id' => $this->primaryKey(),
            'department_name' => $this->string(20),
            'department_desc' => $this->text(),
        ]);
        $this->createTable('pet_action', [
            'id' => $this->primaryKey(),
            'action_user_type' => $this->integer(),
            'action_name' => $this->string(20),
            'action_desc' => $this->text(),
            'department_id' => $this->integer(),
        ]);


        $this->addForeignKey(
            'fk-pet_action-pet_department',
            'pet_action',
            'department_id',
            'pet_department',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createTable('pet_instrument', [
            'id' => $this->primaryKey(),
            'instrument_name' => $this->string(20),
            'instrument_desc' => $this->text(),
        ]);
        $this->createTable('pet_drug', [
            'id' => $this->primaryKey(),
            'drug_name' => $this->string(20),
            'drug_desc' => $this->text(),
        ]);

        $this->createTable('pet_instrument_map', [
            'id' => $this->primaryKey(),
            'instrument_id' => $this->integer(),
            'action_id' => $this->integer(),
        ]);

        $this->createTable('pet_drug_map', [
            'id' => $this->primaryKey(),
            'drug_id' => $this->integer(),
            'action_id' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk-pet_drug_map-pet_action',
            'pet_drug_map',
            'drug_id',
            'pet_action',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-pet_drug_map-pet_drug',
            'pet_drug_map',
            'drug_id',
            'pet_drug',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-pet_instrument_map-pet_action',
            'pet_instrument_map',
            'action_id',
            'pet_action',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-pet_instrument_map-pet_instrument',
            'pet_instrument_map',
            'instrument_id',
            'pet_instrument',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function down()
    {
        echo "m170411_051220_create_department cannot be reverted.\n";

        return false;
    }
}
