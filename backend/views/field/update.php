<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Field */
$shortName = (strlen($model->name) <= 50 )?$model->name:substr($model->name, 0, 47)."...";
$this->title = "Actualizar Pregunta: {$shortName}";
$this->params['breadcrumbs'][] = ['label' => 'Preguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $shortName, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="field-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
