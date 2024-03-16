<?php

use yii\db\Migration;

/**
 * Class m240316_032133_add_foreign_key_for_restaurant
 */
class m240316_032133_add_foreign_key_for_restaurant extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-restaurant-manager_id',
            'restaurant',
            'manager_id',
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
        $this->dropForeignKey('fk-restaurant-manager_id', 'restaurant');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240316_032133_add_foreign_key_for_restaurant cannot be reverted.\n";

        return false;
    }
    */
}
