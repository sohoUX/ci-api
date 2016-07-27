<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Fieldset */

$this->title = 'Crear Grupo de Preguntas';
$this->params['breadcrumbs'][] = ['label' => 'Fieldsets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fieldset-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
