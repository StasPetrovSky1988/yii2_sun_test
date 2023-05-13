<?php

/** @var yii\web\View $this */

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>

<section>
    <br>
    <div class="row">
        <div class="col-md-2">
            <h2>Категории: </h2>
            <hr>
            <?php
                echo Html::a( 'All products','/')  . "<br><br>"; ;

                foreach($categories as $cat) {
                    echo Html::a( $cat->name,'/' . $cat->id)  . "<br>"; ;
                }
            ?>
        </div>
        <div class="col">
            <h2>Товары: </h2>
            <hr>
            <?=
                GridView::widget([
                    'dataProvider' => $products,
                ])
            ;?>
        </div>
    </div>

</section>
