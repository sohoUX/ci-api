<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Form */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Formulario', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
 
$fieldset = "";
if( !empty($model->fieldsets) ){
    $fieldset.="<ol>";
    foreach( $model->fieldsets as $fs ){
        if( !empty($fs->name) ){
            $fieldset.="<li>{$fs->name} ({$fs->percentage}%)</li>";
        }
    }
    $fieldset.="</ol>";
}
else{
    $fieldset = '<span class="not-set">(no definido)</span>';
}

?>
<div class="form-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [

                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description:ntext',
            [
                'label' => 'Grupos de Preguntas',
                'format' => 'raw',
                'value' => $fieldset
            ],
            'user.username:text:Usuario',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
