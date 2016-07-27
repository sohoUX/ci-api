<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Form;

/* @var $this yii\web\View */
/* @var $model common\models\Fieldset */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fieldset-form col-md-6">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'percentage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
