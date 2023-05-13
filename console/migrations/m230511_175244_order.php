<?php

use yii\db\Migration;

/**
 * Class m230511_175244_order
 */
class m230511_175244_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'order', [
                'id' => $this->primaryKey(),
                'date' => $this->date(),
                'total_amount' => $this->integer()
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('order');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230511_175244_order cannot be reverted.\n";

        return false;
    }
    */
}
