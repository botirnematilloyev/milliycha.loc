<?php

use yii\db\Migration;

/**
 * Class m240314_122209_status
 */
class m240314_122209_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("order_item", "status");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240314_122209_status cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240314_122209_status cannot be reverted.\n";

        return false;
    }
    */
}
