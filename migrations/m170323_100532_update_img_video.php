<?php

use yii\db\Migration;

class m170323_100532_update_img_video extends Migration
{
    public function up()
    {
        $this->addColumn('pet_case_unit_image', 'image_path', $this->text());
        $this->addColumn('pet_case_unit_video', 'video_path', $this->text());
    }

    public function down()
    {
        echo "m170323_100532_update_img_video cannot be reverted.\n";

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
