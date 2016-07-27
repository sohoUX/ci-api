<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Subsidiary */

$this->title = "Sucursal: ".$model->name;
$this->params['breadcrumbs'][] = ['label' => 'Subsidiaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subsidiary-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro que quieres eliminar esta sucursal?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'address',
            'manager',
            'consultant',
            'description:ntext',
            'company.name:text:Empresa',
            'province.name:text:Provincia',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
