<?php

use yii\db\Migration;

/**
 * Class m240316_043430_add_user_id_column_to_orders
 */
class m240316_043430_add_user_id_column_to_orders extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%orders}}','user_id',$this->integer()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%orders}}', 'user_id');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240316_043430_add_user_id_column_to_orders cannot be reverted.\n";

        return false;
    }
    */
}
