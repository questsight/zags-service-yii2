<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="act-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'type')->dropdownList([
        1 => 'Рождение человека',
        2 => 'Заключение брака',
        3 => 'Расторжение брака',
        4 => 'Усыновление (удочерение)',
        5 => 'Установление отцовства',
        6 => 'Перемена имени',
        7 => 'Смерть человека'
    ]) ?>

    <?= $form->field($model, 'zags') ?>

    <?= $form->field($model, 'cert_date') ?>

    <?= $form->field($model, 'article_date') ?>

    <?= $form->field($model, 'article_num') ?>

    <?php // echo $form->field($model, 'scan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
