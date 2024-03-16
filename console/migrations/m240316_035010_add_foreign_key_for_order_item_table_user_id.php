<?php

use yii\db\Migration;

/**
 * Class m240316_035010_add_foreign_key_for_order_item_table_user_id
 */
class m240316_035010_add_foreign_key_for_order_item_table_user_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-order_item-user_id',
            'order_item',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-order_item-user_id', 'order_item');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240316_035010_add_foreign_key_for_order_item_table_user_id cannot be reverted.\n";

        return false;
    }
    */
}
