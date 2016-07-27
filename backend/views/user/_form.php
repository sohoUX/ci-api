<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
$labels = User::attributeLabels();
    $typeOptions = null;
    if( $model->isNewRecord ){
        $model->type = 2;
    }
?>

<div class="user-form col-sm-12 col-md-5">
    <?php $form = ActiveForm::begin([ 'options' => ['enctype'=>'multipart/form-data'] ]); ?>
    <?= $form->field($model, 'name')->textInput(['autocomplete'=>'off']); ?>
    <?= $form->field($model, 'last_name')->textInput(['autocomplete'=>'off']); ?>
	<?= $form->field($model, 'username')->textInput(['autocomplete'=>'off']); ?>
	<?= $form->field($model, 'email')->textInput(['autocomplete'=>'off']); ?>
    <?= $form->field($model, 'type')->dropDownList(User::typeLabels()); ?>

    <?= $form->field($model, 'avatar')->fileInput(); ?>

    <?= $form->field($model, 'status')->radioList([User::STATUS_DELETED => 'Inactivo', User::STATUS_ACTIVE => 'Activo']); ?>
    <?php if(!$model->isNewRecord): ?>
    <a data-toggle="collapse" href="#collapsePassword">Cambiar Contraseña</a>
    <div id="collapsePassword" class="collapse panel panel-default">
  		<div class="panel-body">
    		<?= $form->field($model, 'password')->passwordInput(['autocomplete'=>'off']); ?>
    	</div>
    </div>
    <?php else: /*$model->isNewRecord)*/ ?>
    	<?= $form->field($model, 'password')->passwordInput(['autocomplete'=>'off']); ?>
	<?php endif; /*$model->isNewRecord)*/ ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
