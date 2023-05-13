<?php

use yii\db\Migration;

/**
 * Class m230511_175307_order_item
 */
class m230511_175307_order_item extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('order_item', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'product_id' => $this->integer(),
            'quantity' => $this->integer(),
            'total_amount' => $this->integer(),
        ]);

        $this->createIndex('idx-ord_i-ord_id', 'order_item', 'order_id');
        $this->createIndex('idx-ord_i-prod_id', 'order_item', 'product_id');

        $this->addForeignKey(
            'fk-ord_i-ord_id',
            'order_item',
            'order_id',
            'order',
            'id'
        );

        $this->addForeignKey(
            'fk-ord_i-prod_id',
            'order_item',
            'product_id',
            'product',
            'id'
        );
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-ord_i-ord_id',
            'order_item',
        );

        $this->dropForeignKey(
            'fk-ord_i-prod_id',
            'order_item',
        );

        $this->dropIndex(
            'idx-ord_i-ord_id',
            'order_item'
        );

        $this->dropIndex(
            'idx-ord_i-prod_id',
            'order_item'
        );

        $this->dropTable('order_item');


    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230511_175307_order_item cannot be reverted.\n";

        return false;
    }
    */
}
