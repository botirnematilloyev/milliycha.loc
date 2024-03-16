<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%restaurant}}`.
 */
class m240316_005522_create_restaurant_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%restaurant}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->unique(),
            'longitude' => $this->decimal()->notNull(),
            'latitude' => $this->decimal()->notNull(),
            'manager_id' => $this->integer()->notNull()->unique()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%restaurant}}');
    }
}
