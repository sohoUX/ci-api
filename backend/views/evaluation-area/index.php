<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Areas de Evaluación';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evaluation-area-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Area', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description:ntext',
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
