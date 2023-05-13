<?php

use yii\db\Migration;

/**
 * Class m230511_175205_product
 */
class m230511_175205_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'price' => $this->integer(),
            'category_id' => $this->integer()
        ]);

        $this->createIndex(
            'idx-prod-cat_id',
            'product',
            'category_id'
        );

        $this->addForeignKey(
            'fk-prod-cat_id',
            'product',
            'category_id',
            'category',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-prod-cat_id',
            'product'
        );

        $this->dropIndex(
            'idx-prod-cat_id',
            'product'
        );

        $this->dropTable('product');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230511_175205_product cannot be reverted.\n";

        return false;
    }
    */
}
