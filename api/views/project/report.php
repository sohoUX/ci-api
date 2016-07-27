<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'Reunión de Cierre';
$data = [];
$data['project'] = $project->getAttributes();
$data['subsidiary'] = $subsidiary->getAttributes();
$data['round'] = $round->getAttributes();
$data['evaluation'] = $evaluation->getAttributes();
$data = json_encode($data);
$consultant = \Yii::$app->user->identity;
$path = Url::to("project/{$project->id}/subsidiary/{$subsidiary->id}/round/{$round->id}/sendreport", true);
$result = (!empty($evaluation))?round($evaluation->getResult(), 2):0;
$lastest_result = (!empty($lastest_evaluation))?round($lastest_evaluation->getResult(), 2):0;
?>
<div class="title">
    <div class="container">
        <div class="logo-sucursal">
            <img class="img-responsive" ng-src="<?=$subsidiary->company->logo;?>">
        </div>
        <h1><?php echo $project->name; ?></h1>
    </div>
</div>
<div class="feature">
    <div class="container">
        <h2>¡Tu informe está listo!</h2>
        <strong>Te llegará una copia del informa a tu mail <span class="col-purple"><?php echo $consultant->email; ?></span></strong>
        <hr>
        <div class="table-responsive table-standar">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bold">Cliente:</td>
                        <td><?php echo $project->company->name;?></td>
                        <td class="bold">Consultor SMH:</td>
                        <td><?=Yii::$app->user->identity->getFullName();?></td>
                    </tr>
                    <tr>
                        <td class="bold">Área a evaluar:</td>
                        <td><?php echo $subsidiary->manager; ?></td>
                        <td class="bold">Fecha:</td>
                        <td><?php echo date('d.m.Y'); ?></td>
                    </tr>
                    <tr>
                        <td class="bold">Ronda:</td>
                        <td><?php echo $round->position; ?></td>
                        <td class="bold">Resultado Visita:</td>
                        <td><?php echo $result; ?>%</td>
                    </tr>
                    <tr>
                        <td class="bold">Sucursal:</td>
                        <td><?php echo $subsidiary->address; ?></td>
                        <td class="bold">Resultado Visita Anterior:</td>
                        <td><?php echo $lastest_result; ?>%</td>
                    </tr>
                    <tr>
                        <td class="bold">Gerente:</td>
                        <td><?php echo $subsidiary->manager; ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<section class="content" ng-controller="ReportController">
    <div class="container" ng-init="load('<?php echo $path; ?>')">
        <div class="clearfix space-top-3">
            <button type="button" class="btn btn-primary pull-right" ng-click="$root.go('/')">
                Volver a lista de projectos <i class="fa fa-fw fa-chevron-right" aria-hidden="true"></i>
            </button>
            <button type="button" class="btn btn--green" ng-click="sendReport()">Enviar Informe<i class="fa fa-fw fa-chevron-right" aria-hidden="true"></i></button>
        </div>
    </div>
</section>