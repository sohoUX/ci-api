<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Fieldset;
use common\models\Form;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Grupo de Preguntas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fieldset-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Grupo de Preguntas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'label' => 'Nombre',
                'attribute' => 'name',
                'format' => 'raw',
                'filter' => ArrayHelper::map(Fieldset::find()->all(), 'name', 'name'),
                'filterInputOptions'=>['class'=>'form-control', 'data-select' => true , 'multiple'=>true]
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
                'label' => 'Preguntas',
                'format' => 'raw',
                'value' => function($model, $extra){
                    $fieldsAmount = count($model->fields);
                    $action="";
                    $badge = "";
                    if( !empty($model->fields) ){
                        $c = count($model->fields)-1;
                        $actionList = "";
                        foreach( $model->fields as $i => $field ){
                            $actionList.="<li><small>{$field->name}</small></li>";
                        }
                        $action = "<a href='javascript:void(0);' data-popover='{$actionList}'><span class='badge'>{$fieldsAmount}</span></a>";
                        $action = "<ol class='nav nav-pills'><li>{$action}</li></ol>";
                    }
                    else{
                        $action = '<span class="not-set">(no definido)</span>';
                    }
                    return $action;
                }
            ],
            'percentage',
            'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
