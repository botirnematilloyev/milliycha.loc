<?php

use yii\db\Migration;

/**
 * Class m240316_034425_add_foreign_key_for_order_item_table
 */
class m240316_034425_add_foreign_key_for_order_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-order_item-meal_id',
            'order_item',
            'meal_id',
            'meal',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-order_item-meal_id', 'order_item');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240316_034425_add_foreign_key_for_order_item_table cannot be reverted.\n";

        return false;
    }
    */
}
