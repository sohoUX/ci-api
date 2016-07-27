<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use common\models\Company;
use common\models\Province;
use common\models\Country;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Sucursales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subsidiary-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Sucursal', ['create'], ['class' => 'btn btn-success']) ?>
        <?php /* 
        <button class="btn btn-primary fileinput-button">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Importar Sucursales</span>
            <input id="fileupload" type="file" name="importfile" 
                data-uploadpath="<?php echo Yii::$app->urlManager->createUrl('subsidiary/upload');?>">
        </button>
        */ ?>
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
            'name',
            'manager',
            [
                'label' => 'Empresa',
                'attribute' => 'company_id',
                'value' => 'company.name',
                'filter' => ArrayHelper::map(Company::find()->all(), 'id', 'name'),
                'filterInputOptions'=>['class'=>'form-control', 'data-select' => true , 'multiple'=>true],
            ],
            [
                'label' => 'Provincia',
                'attribute' => 'province_id',
                'value' => 'province.name',
                'filter' => ArrayHelper::map(Country::findWithProvinces(), 'id', 'name', 'country' ),
                'filterInputOptions'=>['class'=>'form-control', 'data-select' => true , 'multiple'=>true],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
