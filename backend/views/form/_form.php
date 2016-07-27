<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;
use common\models\Fieldset;

/* @var $this yii\web\View */
/* @var $model common\models\Form */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-form col-md-8">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
	<?php if(!$model->isNewRecord): ?>
    <?= $form->field($model, 'fieldsets')
        ->listBox(ArrayHelper::map(Fieldset::find()->all(), 'id', 'title'), ['prompt'=>'Seleccione los Grupos de Preguntas', 'size' => 12, 'multiple' => true, 'data-select' => true]) ?>
    <ul class="list-group" data-sortable>
        <?php foreach( $model->getSortedFieldsets() as $i => $fieldset ): ?>
            <li class="list-group-item" data-id="<?php echo $fieldset->id; ?>">
                <label><?php echo $fieldset->title; ?></label>
                <input type="hidden" 
                    name="Form[fieldsets_positions][<?php echo $fieldset->id; ?>]" 
                    data-position value="<?php echo ($i+1); ?>" />
                <span data-sortable-handler class="glyphicon glyphicon-sort pull-right"></span>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php endif; /* !$model->isNewRecord */ ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
