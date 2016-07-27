<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Fieldset */

$this->title = 'Actualizar Grupo de Preguntas: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Grupo de Preguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="fieldset-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
