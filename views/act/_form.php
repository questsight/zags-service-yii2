<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Act */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="act-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->dropdownList([
        1 => 'Рождение человека',
        2 => 'Заключение брака',
        3 => 'Расторжение брака',
        4 => 'Усыновление (удочерение)',
        5 => 'Установление отцовства',
        6 => 'Перемена имени',
        7 => 'Смерть человека'
    ]) ?>

    <?= $form->field($model, 'zags')->dropdownList([
        1 => 'Название 1',
        2 => 'Название 2',
        3 => 'Название 3',
    ]) ?>

    <?= $form->field($model, 'cert_date')->input('date', ['required']) ?>

    <?= $form->field($model, 'article_date')->input('date', ['required']) ?>

    <?= $form->field($model, 'article_num')->textInput(['maxlength' => true]) ?>

    <?php
    if(isset($model->scan) && file_exists(Yii::getAlias('@webroot', $model->scan)))
    { 
        echo Html::img($model->scan, ['class'=>'img-responsive']);
        echo $form->field($model,'del_img')->checkBox(['class'=>'span-1']);
    }
    ?>
    <?= $form->field($model, 'scan')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
