<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view col-md-6">

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
    $formList = "";
    $forms = $model->getFormsWithPercentage();
    if( !empty($forms) ){
        $formList = "<ul>";
        foreach( $forms as $form ){
            $formList.= "<li>{$form['name']} ({$form['percentage']}%)</li>";
        }
        $formList.="</ul>";
    }
    $roundList = "";
    if( !empty($model->rounds) ){
        $roundList = "<div>";
        foreach( $model->rounds as $round ){
            $action = "<a href='javascript:void(0);' ".
                "data-view-round='{$round->id}' ".
                "data-modal='".(Url::to(['round/view', 'round_id' => $round->id]))."'".
                ">{$round->name}</a>";
            $action = "<ul class='nav nav-pills'><li>{$action}</li></ul>";
            $roundList.= "<p>{$action}</p>";
        }
        $roundList.="</div>";
    }
?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'area.name:text:Area',
            'company.name:text:Empresa',
            'status_name:text:Estado',
            [
                'label' => 'Formularios',
                'format' => 'raw',
                'value' => $formList,
            ],
            [
                'label' => 'Rondas',
                'format' => 'raw',
                'value' => $roundList,
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
<?= $this->render('_round', ['model' => $model ]) ?>

