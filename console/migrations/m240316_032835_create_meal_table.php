<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%meal}}`.
 */
class m240316_032835_create_meal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%meal}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'ingredients' => $this->text(),
            'cost' => $this->decimal()->notNull(),
            'meal_category_id' => $this->integer()->notNull()
        ]);
    }
    public function safeDown()
    {
        $this->dropTable('{{%meal}}');
    }
}