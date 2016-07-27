<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Fieldset;
use common\models\Field;
use common\models\FieldSkipLogic;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Field */
/* @var $form yii\widgets\ActiveForm */
$model->type = 1;
$skYes = FieldSkipLogic::findOne(['field_id' => $model->id, 'answer' => 1 ]);
$skNo  = FieldSkipLogic::findOne(['field_id' => $model->id, 'answer' => 2 ]);
$skNa  = FieldSkipLogic::findOne(['field_id' => $model->id, 'answer' => 0 ]);
$fields = Field::findAll(['fieldset_id' => $model->fieldset_id /*, ['NOT IN', 'id', [$model->id]] */]);
//echo '<pre>'; print_r( $fields ); echo '</pre>'; exit;
?>

<div class="field-form col-md-8">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fieldset_id')
        ->dropDownList(ArrayHelper::map(Fieldset::find()->all(), 'id', 'name'), ['prompt'=>'Seleccione un Grupo de Preguntas']) ?>
    <?php if( !$model->isNewRecord ): ?>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapseSkipLogic" aria-controls="collapseSkipLogic"
                            data-parent="#accordion" role="button">Saltos Logicos</a>
                    </h4>
                </div>
                <div id="collapseSkipLogic" class="panel-collapse collapse out">
                    <div class="panel-body">
                        <div class="row form-group">
                            <div class="col-md-2"><strong>Respuesta</strong></div>
                            <div class="col-md-10"><strong>Pregunta</strong></div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-1 col-md-offset-1">SI</div>
                            <div class="col-md-10">
                                <select name="Field[field_skip_logic][1]" class="form-control">
                                    <option value="">Seleccione una pregunta</option>
                                    <?php foreach( $fields as $field ): ?>
                                        <option value="<?= $field->id ?>" 
                                            <?= (($skYes) && $field->id == $skYes->target_id)?'selected':''; ?>>
                                            <?= $field->name ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-1 col-md-offset-1">NO</div>
                            <div class="col-md-10">
                                <select name="Field[field_skip_logic][2]" class="form-control">
                                    <option value="">Seleccione una pregunta</option>
                                    <?php foreach( $fields as $field ): ?>
                                        <option value="<?= $field->id ?>" 
                                            <?= (($skNo) && $field->id == $skNo->target_id)?'selected':''; ?>>
                                            <?= $field->name ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapsePredefinedAnswers" aria-controls="collapsePredefinedAnswers"
                            data-parent="#accordion" role="button">Respuestas Predefinidas</a>
                    </h4>
                </div>
                <div id="collapsePredefinedAnswers" class="panel-collapse collapse out">
                    <div class="panel-body">
                        <?php /* <div class="row form-group">
                            <label class="col-md-12">SI</label>
                            <div class="col-md-12">
                                <textarea name="Field[predefined_answer][1]" class="form-control" rows="5"
                                ><?php echo $model->getPredefinedYes(); ?></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-12">NO</label>
                            <div class="col-md-12">
                                <textarea name="Field[predefined_answer][2]" class="form-control" rows="5"
                                ><?php echo $model->getPredefinedNo(); ?></textarea>
                            </div>
                        </div> */ ?>
                        <ul class="list-group">
                            <li class="list-group-item text-center">
                                <strong>SI</strong>
                            </li>
                            <?php if( $model->hasPredefinedYes() ): ?>
                                <?php foreach( $model->getPredefinedYes() as $i => $alternative ): ?>
                                <?php predefinedAnswer(1, $i, $alternative->detail); ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <li class="list-group-item text-center">
                                <button class="btn btn-link btn-sm" type="button" data-add-alternative="yes"
                                >Añadir Alternativa</button>
                            </li>
                        </ul>
                        <ul class="list-group">
                            <li class="list-group-item text-center">
                                <strong>NO</strong>
                            </li>
                            <?php if( $model->hasPredefinedNo() ): ?>
                                <?php foreach( $model->getPredefinedNo() as $i => $alternative ): ?>
                                <?php predefinedAnswer(2, $i, $alternative->detail); ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <li class="list-group-item text-center">
                                <button class="btn btn-link btn-sm" type="button" data-add-alternative="no"
                                >Añadir Alternativa</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="hidden">
        <?= $form->field($model, 'type')->hiddenInput(['readonly' => true]) ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php function predefinedAnswer($type = 1, $n = 0, $value = ""){ 

    $attrName = ($n === '{key}')?'data-name':'name';
?>
<li class="list-group-item">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Ingresa una alternativa" value="<?php echo $value; ?>"
            <?php echo $attrName;?>="Field[predefined_answer][<?php echo $type; ?>][<?php echo $n; ?>]">
        <span class="input-group-btn">
            <button class="btn btn-default" type="button" data-delete="alternative">
                <span class="glyphicon glyphicon-trash"></span>
            </button>
        </span>
    </div><!-- /input-group -->
</li>
<?php } /* predefinedAnswer */ ?>
<div id="yes-template" class="hidden">
    <?php echo predefinedAnswer(1, "{key}", ""); ?>
</div>
<div id="no-template" class="hidden">
    <?php echo predefinedAnswer(2, "{key}", ""); ?>
</div>

    <?php ActiveForm::end(); ?>

</div>
