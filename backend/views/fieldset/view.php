<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Fieldset */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Grupo de Preguntas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fieldset-view col-md-8">

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
    <?php 
        $fields = "";
        if( !empty($model->fields) ){
            $fields.="<ol>";
            foreach( $model->fields as $field ){
                if( !empty($field->name) ){
                    $fields.="<li>{$field->name}</li>";
                }
            }
            $fields.="</ol>";
        }
        else{
            $fields = '<span class="not-set">(no definido)</span>';
        }
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description',
            'percentage',
            [
                'label' => 'Preguntas',
                'format' => 'raw',
                'value' => $fields
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
