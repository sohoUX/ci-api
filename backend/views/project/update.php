<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = 'Actualizar Projecto: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="project-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form',  ['model' => $model ]) ?>
    <?= $this->render('_round', ['model' => $model ]) ?>
</div>
