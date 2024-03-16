<?php

use yii\db\Migration;

/**
 * Class m240316_035921_add_foreign_key_for_orders_table_restaurant_id
 */
class m240316_035921_add_foreign_key_for_orders_table_restaurant_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-orders-restaurant_id',
            'orders',
            'restaurant_id',
            'restaurant',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-orders-restaurant_id','orders');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240316_035921_add_foreign_key_for_orders_table_restaurant_id cannot be reverted.\n";
        return false;
    }
    */
}
