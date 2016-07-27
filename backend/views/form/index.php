<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\Project;
use common\models\Form;
use common\models\Fieldset;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Formularios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Formularios', ['create'], ['class' => 'btn btn-success']) ?>        
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'label' => 'Proyectos',
                'attribute' => 'projects_id',
                'format' => 'raw',
                'value' => function($model, $extra){
                    $action="";
                    $badge = "";
                    if( !empty($model->projects) ){
                        if( count($model->projects) == 1 ){
                            $project = $model->projects[0];
                            $action = "<span>{$project->name}</span>";
                        }
                        else{
                            $c = count($model->projects)-1;
                            $actionList = "";
                            foreach( $model->projects as $i => $project ){
                                if( $i == 0 ){
                                    $badge = "{$project->name} <span class='badge'>+{$c}</span>";
                                }
                                else{
                                    $actionList.="<p>{$project->name}</p>";
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
                'filter' => ArrayHelper::map(Project::find()->all(), 'id', 'name'),
                'filterInputOptions'=>['class'=>'form-control', 'data-select' => true , 'multiple'=>true],
            ],
            [
                'label' => 'Grupos de Preguntas',
                'attribute' => 'fieldsets_id',
                'format' => 'raw',
                'value' => function($model, $extra){
                    $action="";
                    $badge = "";
                    if( !empty($model->fieldsets) ){
                        if( count($model->fieldsets) == 1 ){
                            $fieldset = $model->fieldsets[0];
                            $action = "<span>{$fieldset->name}</span>";
                        }
                        else{
                            $c = count($model->fieldsets)-1;
                            $actionList = "";
                            foreach( $model->fieldsets as $i => $fieldset ){
                                if( $i == 0 ){
                                    $badge = "{$fieldset->name} ({$fieldset->percentage}%) <span class='badge'>+{$c}</span>";
                                }
                                else{
                                    $actionList.="<p>{$fieldset->name} ({$fieldset->percentage}%)</p>";
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
                'filter' => ArrayHelper::map(Fieldset::find()->all(), 'id', 'name'),
                'filterInputOptions'=>['class'=>'form-control', 'data-select' => true , 'multiple'=>true],
            ],
            'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
