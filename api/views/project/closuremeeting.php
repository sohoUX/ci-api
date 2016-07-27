<?php
use common\models\ProjectRoundObservation;
/* @var $this yii\web\View */

$labels = ProjectRoundObservation::attributeLabels();
//echo '<pre>'; print_r( $labels ); echo '</pre>';
$this->title = 'Reunión de Cierre';
$round_observation = json_encode($roundObservation->getAttributes());
$labels = json_encode($labels);
?>
<div class="title">
    <div class="container">
        <div class="logo-sucursal">
            <img class="img-responsive" ng-src="<?=$subsidiary->company->logo;?>">
        </div>
        <h1>Reunión de Cierre</h1>
    </div>
</div>
<div class="feature">
    <div class="container">
        <button type="button" class="btn btn-primary" ng-click="$root.go('/')">
            Guardar y salir <i class="fa fa-fw fa-sign-out" aria-hidden="true"></i>
        </button>
        <p>Estás evaluando</p>
        <div class="table-responsive table-standar">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bold">Sucursal:</td>
                        <td><?php echo $subsidiary->getTitle();?></td>
                        <td class="bold">Consultor SMH:</td>
                        <td><?=Yii::$app->user->identity->getFullName();?></td>
                    </tr>
                    <tr>
                        <td class="bold">Gerente:</td>
                        <td><?php echo $subsidiary->manager; ?></td>
                        <td class="bold">Fecha:</td>
                        <td><?php echo date('d.m.Y'); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<section class="content" ng-controller="ClosureMeetingController" 
    ng-init='load(<?php echo $round_observation; ?>, <?php echo $labels ?>);'>
    <div class="container">
        <h2 class="col-purple">Observaciones en la evaluación.</h2>
        <form class="form form-observaciones">
            <div class="row">
                <div class="col-sm-6 col-md-6" ng-repeat="slug in slugs">
                    <div class="form-group">
                        <label for="fortalezas">{{ labels[slug] }}</label>
                        <textarea class="form-control" ng-model="observations[slug]" rows="5" ng-change="save()"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="container">
        <h2 class="col-purple">Reunión de Cierre.</h2>
        <form class="form form-observaciones">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea class="form-control" ng-model="observations.comment" ng-change="save()"
                            rows="10"></textarea>
                    </div>
                </div>
            </div>
        </form>
        <div class="clearfix space-top-3">
            <button type="button" class="btn btn-primary pull-right" ng-click="saveAndReview()">
                Guardar y revisar informe <i class="fa fa-fw fa-chevron-right" aria-hidden="true"></i>
            </button>
            <button type="button" class="btn btn--green" ng-click="sendMemo()">Enviar Minuta</button>
        </div>
    </div>
</section>