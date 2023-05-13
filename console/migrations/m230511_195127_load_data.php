<?php

use yii\db\Migration;

/**
 * Class m230511_195127_load_data
 */
class m230511_195127_load_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        for ($i = 1; $i <= 5; $i++) {
            $this->insert('category', ['id' => $i, 'name' => 'category_' . $i]);
        }

        $products = [];

        for ($i = 1; $i <= 40; $i++) {

            $price = mt_rand(10, 10000);
            $products[$i] = $price;

            $this->insert('product', ['id' => $i, 'name' => 'product_' . $i, 'price' => $price, 'category_id' => mt_rand(1, 5)]);
        }

        $orders_items_array = [];

        // Создадим заказ
        for ($i = 1; $i <= 20; $i++) {
            $order_total_amount = 0;

            // Добавим в заказ товары
            for ($oi = 1; $oi <= mt_rand(1, 7); $oi++) {
                $product_id = mt_rand(1, 40);
                $product_price = $products[$product_id];
                $quantity = mt_rand(1, 10);
                $total_amount = $product_price * $quantity;
                $order_total_amount += $total_amount;

                $orders_items_array[$i][$oi]['order_id'] = $i;
                $orders_items_array[$i][$oi]['product_id'] = $product_id;
                $orders_items_array[$i][$oi]['quantity'] = $quantity;
                $orders_items_array[$i][$oi]['total_amount'] = $total_amount;

            }

            $date = date('Y-m-d', strtotime('4/' . mt_rand(1, 30) . '/2023'));

            $this->insert('order', ['id' => $i, 'date' => $date, 'total_amount' => $order_total_amount]);
        }

        for ($i = 1; $i <= 20; $i++) {
            $order_items = $orders_items_array[$i];

            foreach ($order_items as $item) {
                $this->insert('order_item', ['order_id' => $item['order_id'], 'product_id' => $item['product_id'], 'quantity' => $item['quantity'], 'total_amount' => $item['total_amount']]);

            }
        }




    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('order_item');
        $this->delete('order');
        $this->delete('product');
        $this->delete('category');


    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230511_195127_load_data cannot be reverted.\n";

        return false;
    }
    */
}
