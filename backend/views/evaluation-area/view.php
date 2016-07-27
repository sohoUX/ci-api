<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\EvaluationArea */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Area de Evaluación', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evaluation-area-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que desea eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
