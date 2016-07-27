<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EvaluationArea */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evaluation-area-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
