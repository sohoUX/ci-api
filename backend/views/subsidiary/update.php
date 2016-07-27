<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Subsidiary */

$this->title = 'Actualizar Sucursal: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Subsidiaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subsidiary-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
