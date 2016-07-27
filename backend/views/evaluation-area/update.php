<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EvaluationArea */

$this->title = 'Actualizar el Area de Evaluación: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Area de Evaluación', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="evaluation-area-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
