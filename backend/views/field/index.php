<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Fieldset;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Preguntas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="field-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Pregunta', ['create'], ['class' => 'btn btn-success']) ?>
        <button class="btn btn-primary fileinput-button">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Importar Preguntas</span>
            <input id="fileupload" type="file" name="importfile" 
                data-uploadpath="<?php echo Yii::$app->urlManager->createUrl('field/upload');?>">
        </button>
    </p>
    <div id="fileupload-progress" class="list-group hidden">
        <div class="list-group-item">
            <h4 id="fileupload-name" class="list-group-item-heading"></h4>
            <div class="list-group-item-text">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 0%;">0%</div>
                </div>
            </div>
        </div>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'options'=>['style'=>'width: 30px !important;'] ],
            [
                'attribute' => 'name',
                'label' => 'Nombre',
                'format' => 'raw',
                'value' => 'name',
                'contentOptions'=>['class'=>'split-name'] // <-- right here
            ],
            [
                'label' => 'Grupo de Preguntas',
                'attribute' => 'fieldsetId',
                'value' => 'fieldsetName',
                //'format' => 'raw',
                'filter' => ArrayHelper::map(Fieldset::find()->all(), 'id', 'name'),
                'filterInputOptions'=>['class'=>'form-control', 'data-select' => true , 'multiple'=>true],
            ],
            [
                'label' => 'Respuestas Predefinidas',
                'attribute' => 'fieldset_answers',
                'format' => 'raw',
                'value' => function($model, $extra){
                    $answers = [];
                    $total = 0;
                    if( $model->hasPredefinedYes() ){
                        $answers[] = "<li><strong>SI</strong><ul>";
                        foreach( $model->getPredefinedYes() as $answer){
                            $answers[] = "<li>{$answer->detail}</li>";
                            $total++;
                        }
                        $answers[] = "</ul></li>";
                    }
                    if( $model->hasPredefinedNo() ){
                        $answers[] = "<li><strong>NO</strong><ul>";
                        foreach( $model->getPredefinedNo() as $answer){
                            $answers[] = "<li>{$answer->detail}</li>";
                            $total++;
                        }
                        $answers[] = "</ul></li>";
                    }
                    if( !empty($answers) ){
                        $answers = join("", $answers);
                    }
                    else{
                        $answers = 0;
                    }
                    
                    $action = "<a href='javascript:void(0);' data-popover='{$answers}'><span class='badge'>{$total}</span></a>";
                    return $action;
                }
                //'format' => 'raw',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
