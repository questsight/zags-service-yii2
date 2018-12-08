<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Act */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Акты гражданского сотояния', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="act-view">

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
              'attribute' => 'type',
              'format' => 'text',
              'value' =>  function($value){
                if($value==1){
                  return 'Рождение человека';  
                }elseif($value==2){
                  return 'Заключение брака';
                }elseif($value==3){
                  return 'Расторжение брака';
                }elseif($value==4){
                  return 'Усыновление (удочерение)';
                }elseif($value==5){
                  return 'Установление отцовства';
                }elseif($value==6){
                  return 'Перемена имени';
                }elseif($value==7){
                  return 'Смерть человека';
                } 
              }
            ],
            [
              'attribute' => 'zags',
              'format' => 'text',
              'value' =>  function($value){
                if($value==1){
                  return 'Название 1';  
                }elseif($value==2){
                  return 'Название 2';
                }elseif($value==3){
                  return 'Название 3';
                }
              }
            ],
            [
              'attribute' => 'cert_date',
              'format' =>  ['date', 'dd.MM.Y'],
            ],
            [
              'attribute' => 'article_date',
              'format' =>  ['date', 'dd.MM.Y'],
            ],
            'article_num',
            'scan:image',
        ],
    ]) ?>

</div>
