<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form col-sm-12 col-md-5">
    <?php if( !empty($model) && $model->hasErrors() ): ?>
        <div class="col-md-12">
            <?php foreach( $model->getErrors() as $field => $errors ): ?>
                <div class="alert alert-warning" role="alert">
                <strong><?=$field;?></strong>
                    <?php foreach( $errors as $i => $error ): ?>
                        <p><?=$error;?></p>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php $form = ActiveForm::begin([ 'options' => ['enctype'=>'multipart/form-data'] ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

	<?= $form->field($model, 'logo')->fileInput(['accept' => 'image/*']); ?>
    <?php if( $model->hasLogo() ): ?>
        <div class="form-group field-company-logo">
            <img src="<?php echo $model->logo;?>" class="img-thumbnail img-responsive" />
        </div>
    <?php endif; ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
