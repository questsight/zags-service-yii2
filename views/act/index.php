<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Акты гражданского сотояния';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="act-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить акт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['tag' => 'div', 'class' => 'col-lg-12 table-index'], // оборачиваем в div с Bootstrap CSS
        'emptyTextOptions' => ['tag' => 'p', 'class' => 'text-center text-danger'],
        'emptyText' => 'По вашему запросу ничего не найдено',
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
