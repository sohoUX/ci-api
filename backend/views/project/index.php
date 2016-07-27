<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use common\models\EvaluationArea;
use common\models\Project;
use common\models\Company;
use common\models\User;
use common\models\Form;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proyectos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Proyecto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'label' => 'Area',
                'attribute' => 'area_id',
                'value' => 'area.name',
                'filter' => ArrayHelper::map(EvaluationArea::find()->all(), 'id', 'name'),
                'filterInputOptions'=>['class'=>'form-control', 'data-select' => true , 'multiple'=>true],
            ],
            [
                'label' => 'Empresa',
                'attribute' => 'company_id',
                'value' => 'company.name',
                'filter' => ArrayHelper::map(Company::find()->all(), 'id', 'name'),
                'filterInputOptions'=>['class'=>'form-control', 'data-select' => true , 'multiple'=>true],
            ],
            [
                'label' => 'Formularios',
                'attribute' => 'forms_id',
                'format' => 'raw',
                'value' => function($model, $extra){
                    $action="";
                    $badge = "";
                    if( !empty($model->forms) ){
                        if( count($model->forms) == 1 ){
                            $form = $model->forms[0];
                            $action = "<span>{$form->name}</span>";
                        }
                        else{
                            $c = count($model->forms)-1;
                            $actionList = "";
                            foreach( $model->forms as $i => $form ){
                                if( $i == 0 ){
                                    $badge = "{$form->name} <span class='badge'>+{$c}</span>";
                                }
                                else{
                                    $actionList.="<p>{$form->name}</p>";
                                }
                            }
                            $action = "<a href='javascript:void(0);' data-popover='{$actionList}'>{$badge}</a>";
                            $action = "<ul class='nav nav-pills'><li>{$action}</li></ul>";
                        }
                    }
                    else{
                        $action = '<span class="not-set">(no definido)</span>';
                    }
                    return $action;
                },
                'filter' => ArrayHelper::map(Form::find()->all(), 'id', 'name'),
                'filterInputOptions'=>['class'=>'form-control', 'data-select' => true , 'multiple'=>true],
            ],
            [
                'label' => 'Estado',
                'attribute' => 'status',
                'value' => 'status_name',
                'filter' => Project::statusLabels(),
                'filterInputOptions'=>['class'=>'form-control', 'data-select' => true , 'multiple'=>true],
            ],
            [ 'attribute' => 'updated_at', 'format' => ['date', 'php:d/m/Y'] ],  

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {reports}',
                'buttons' => [
                    'reports' => function ($url, $model, $index) {
                        return Html::button('<span class="glyphicon glyphicon-list"></span>', 
                            [ 
                                'title' => 'Reportes', 
                                'data-action' => Url::to(['project/reports', 'id' => $model->id]), 
                                'data-toggle' => 'modal' ,
                                'data-target' => "#evaluations",
                                'class' => 'btn-link',
                                'data-tooltip' => ""
                            ]
                        );
                    }
                ],
            ],
        ],
    ]); ?>
</div>
<!-- Modal -->
<div class="modal fade" id="evaluations" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Reportes</h4>
            </div>
            <div class="modal-body">
                <div class="loading" data-loading>
                    <div class="step1"></div>
                    <div class="step2"></div>
                </div>
                <table class="table table-striped table-head hidden" data-result>
                    <colgroup>
                        <col width="10%"/>
                        <col width="30%"/>
                        <col width="20%"/>
                        <col width="20%"/>
                        <col width="10%"/>
                    </colgroup>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Consultor</th>
                            <th>Ronda</th>
                            <th>Fecha</th>
                            <th>Reporte</th>
                        </tr>
                    </thead>
                </table>
                <div class="table-scroll">
                    <table id="project-evaluations" class="table table-striped">
                        <colgroup>
                            <col width="10%"/>
                            <col width="30%"/>
                            <col width="20%"/>
                            <col width="20%"/>
                            <col width="10%"/>
                        </colgroup>
                        <tbody>
                        </tbody>
                    </table>
                </a>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>
<style>
    .table-head{
        margin-bottom: 0px;
    }
    .table-scroll{
        max-height: 400px;
        overflow: auto;
    }
    a.btn.disabled{
        pointer-events: all !important;
    }
</style>