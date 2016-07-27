<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Field */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Preguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="field-view col-md-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php if( $model->hasPredefinedYes() || $model->hasPredefinedNo()) {
            $answers = "";
            if( $model->hasPredefinedYes() ){
                $answers.="<strong>Si</strong>";
                $answers.="<ul>";
                foreach( $model->getPredefinedYes() as $answer ){
                    $answers.="<li>".$answer->detail."</li>";
                }
                $answers.="</ul>";
            }
            if( $model->hasPredefinedNo() ){
                $answers.="<strong>No</strong>";
                $answers.="<ul>";
                foreach( $model->getPredefinedNo() as $answer ){
                    $answers.="<li>".$answer->detail."</li>";
                }
                $answers.="</ul>";
            }
        }
        else{
            $answers = '<span class="not-set">(no definido)</span>';
        }
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'name',
            'description',
            [
                'label' => 'Respuestas Predefinida',
                'format' => 'raw',
                'value' => $answers
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
