<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m230511_175147_category
 */
class m230511_175147_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('category');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230511_175147_category cannot be reverted.\n";

        return false;
    }
    */
}
