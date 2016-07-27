<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Company;
use common\models\Country;

/* @var $this yii\web\View */
/* @var $model common\models\Subsidiary */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subsidiary-form col-sm-12 col-md-5">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manager')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'consultant')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'company_id')
        ->dropDownList(ArrayHelper::map(Company::find()->all(), 'id', 'name'), ['prompt'=>'Seleccione una Empresa']) ?>

    <?= $form->field($model, 'province_id')
        ->dropDownList(ArrayHelper::map(Country::findWithProvinces(), 'id', 'name', 'country'), ['prompt'=>'Seleccione una Comuna', 'data-select' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
