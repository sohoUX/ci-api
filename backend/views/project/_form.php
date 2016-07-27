<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\widgets\ActiveForm;
use common\models\Company;
use common\models\Project;
use common\models\Form;
use common\models\User;
use common\models\Subsidiary;
use common\models\EvaluationArea;
use yii\jui\AutoComplete;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Project */
/* @var $form yii\widgets\ActiveForm */
//echo '<pre>'; print_r( $model->forms ); echo '</pre>'; exit;

?>

<div class="project-form col-md-11">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area_id')
        ->dropDownList(ArrayHelper::map(EvaluationArea::find()->all(), 'id', 'name'), ['prompt'=>'Seleccione un Area de evaluación']) ?>

    <?= $form->field($model, 'company_id')
        ->dropDownList(ArrayHelper::map(Company::find()->all(), 'id', 'name'), ['prompt'=>'Seleccione una Empresa', 'data-select' => true]) ?>

    <?php /* $form->field($model, 'subsidiaries')
        ->listBox(ArrayHelper::map(Subsidiary::find()->all(), 'id', 'name', 'company.name'), ['prompt'=>'Seleccione las Sucursales', 'size' => 12, 'data-filter' => '#project-company_id', 'multiple' => true, 'data-select' => true]) */ ?>
    <?php if( !$model->isNewRecord ): ?>
        <?= $form->field($model, 'forms')
            ->listBox(ArrayHelper::map(Form::find()->all(), 'id', 'name'), ['prompt'=>'Seleccione los formularios', 
                'size' => 12, 'multiple' => true, 'data-select' => true]); ?>
        <div class="col-md-12">
            <div id="form-percentages" class="col-md-10">
                <ul class="list-group" data-sortable>
                    <?php foreach ($model->getSortedForms() as $i => $relatedForm): ?>
                        <?php formPercentagesTemplate($relatedForm->id, $relatedForm->name, $relatedForm->getPercentage($model), ($i+1)); ?>
                    <?php endforeach; ?> 
                </ul>
            </div>
        </div>
    <?php endif; ?>
    <?= $form->field($model, 'status')
        ->radioList(Project::statusLabels(), ['prompt'=>'Seleccione las Sucursales']) ?>

    <?php /*  $form->field($model, 'consultant_id')->dropDownList(ArrayHelper::map( User::findConsultants(), 'id', 'fullname'), ['data-select' => true]); */ ?>
    <?php if( !$model->isNewRecord ): ?>
    <div class="form-group">
        <label class="control-label">Rondas</label>
        <div class="">
            <table id="round-list" class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ronda</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de Termino</th>
                        <th>Activo</th>
                        <th>
                            <a href="javascript:void(0);" title="Agregar" aria-label="Agregar" id="add-round"
                            class="btn btn-default btn-xs">
                                <span class="glyphicon glyphicon-plus"></span>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach( $model->rounds as $i => $round ):?>
                    <tr>
                        <td><?= $round->position;?></td>
                        <td>
                            <input name="Project[rounds][<?=$i;?>][id]" type="hidden" value="<?= $round->id;?>"/>
                            <input name="Project[rounds][<?=$i;?>][name]" type="text" value="<?= $round->name;?>" />
                        </td>
                        <td>
                            <input name="Project[rounds][<?=$i;?>][start_date]" type="text" value="<?= $round->format('start_date');?>" data-date/>
                        </td>
                        <td>
                            <input  name="Project[rounds][<?=$i;?>][end_date]" type="text" value="<?= $round->format('end_date');?>" data-date/>
                        </td>
                        <td>
                            <input name="Project[rounds][<?=$i;?>][status]" type="radio" value="1" data-radiogroup
                            <?= ($round->status == 1)?"checked":"";?>/>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <button type="button" data-edit-round="<?= $round->id;?>" 
                                data-modal="<?= Url::to(['round/modal', 'round_id' => $round->id]); ?>" 
                                    class="btn btn-default btn-xs">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                                <button type="button" data-delete="round" 
                                    class="btn btn-danger  btn-xs">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif; /* if isNewRecord */?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<div id="template-form-percentage" class="hidden">
    <?php formPercentagesTemplate("", "", 0, "" );?>
</div>
<?php function formPercentagesTemplate($form_id = null, $name = "", $value = 0, $pos = 1 ){ ?>
    <li class="list-group-item" data-form-id="<?php echo $form_id; ?>">
        <div class="col-md-10">
            <label data-sortable-handler><?php echo $name; ?></label>
        </div>
        <div class="col-md-2 input-group">
            <input data-input-percentage name="Project[form_percentages][<?php echo $form_id; ?>]" type="number" class="form-control" value="<?php echo $value; ?>">
            <span class="input-group-addon">%</span>
        </div>
        <input type="hidden" name="Project[form_positions][<?php echo $form_id; ?>]" 
            data-position value="<?php echo $pos?>" />
    </li>
<?php } ?>