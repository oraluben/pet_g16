<?php

use yii\db\Migration;

class m170323_001044_update_case_unit_type extends Migration
{
    public function up()
    {
        $this->addColumn('pet_case_unit', 'unit_type', $this->integer()->notNull());
    }

    public function down()
    {
        echo "m170323_001044_update_case_unit_type cannot be reverted.\n";

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
