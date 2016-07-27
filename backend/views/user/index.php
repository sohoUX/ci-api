<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\User;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yii', 'Usuarios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'id', 'options'=>['style'=>'width: 30px !important;'] ],
            'fullName:text:Nombre',
            'username',
            'email:email',
            [
                'label' => 'Estado',
                'attribute' => 'status',
                'value' => 'statusname',
                'filter' => User::statusLabels(),
                'filterInputOptions'=>['class'=>'form-control', 'data-select' => true],
            ],
            [
                'label' => 'Tipo',
                'attribute' => 'type',
                'value' => 'typename',
                'filter' => User::typeLabels(),
                'filterInputOptions'=>['class'=>'form-control', 'data-select' => true],
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
