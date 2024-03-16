<?php

use yii\db\Migration;

/**
 * Class m240316_033237_add_foreign_key_for_meal_table
 */
class m240316_033237_add_foreign_key_for_meal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-meal-meal_category_id',
            'meal',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-meal-category_id', 'meal');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240316_033237_add_foreign_key_for_meal_table cannot be reverted.\n";

        return false;
    }
    */
}
