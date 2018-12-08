<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Act */

$this->title = 'Добавить акт';
$this->params['breadcrumbs'][] = ['label' => 'Акты гражданского состояния', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="act-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
