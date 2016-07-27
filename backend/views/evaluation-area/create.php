<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EvaluationArea */

$this->title = 'Crear Area de Evaluación';
$this->params['breadcrumbs'][] = ['label' => 'Areas de Evaluación', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evaluation-area-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
