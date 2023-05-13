<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
?>

<section>
    <div class="mt-5 offset-lg-3 col-lg-6">
        <h2>Добваить категорию: </h2>
        <hr>
        <?php $form = ActiveForm::begin([
        ]); ?>

        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'price')->textInput() ?>
        <?= $form->field($model, 'category_id')->dropDownList($categories) ?>

        <div class="form-group">
            <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</section>