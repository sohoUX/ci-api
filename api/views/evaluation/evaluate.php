<?php

/* @var $this yii\web\View */

$this->title = 'Evaluación '.$evaluation->form->name;
?>
<div class="title">
    <div class="container">
        <div class="logo-sucursal">
            <img class="img-responsive" ng-src="<?=$subsidiary->company->logo;?>">
        </div>
        <h1>Evaluación de <strong>"<?php echo $evaluation->form->name; ?>"</strong></h1>
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
                        <td><?php echo $subsidiary->manager; ?> <a class="col-red a-underline hidden" href="javascript:void(0)">ingresar otro</a></td>
                        <td class="bold">Fecha:</td>
                        <td><?php echo date('d.m.Y'); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<section class="content" ng-controller="EvaluateController" ng-init='load(<?php echo $evaluation->id; ?>);'>
    <div class="container" ng-init="csrf = '<?php echo Yii::$app->request->getCsrfToken(); ?>'">
        <h2 class="col-purple">Selecciona una opción a evaluar.</h2>
        <p>Estás en la ronda {{ round.position }} 
            <span ng-if="lastest_round"> / Resultado ronda anterior: <strong>{{ lastest_round.result }}%</strong></span>
        </p>
        <div class="flujo-evaluacion">
            <uib-tabset active="activeJustified" justified="true">
                <uib-tab ng-repeat="(key, fieldset) in fieldsets">
                    <uib-tab-heading>
                        {{ fieldset.name }}
                        <div class="progress">
                            <div class="percent" ng-style="fieldsets[key].progress"></div>
                        </div>
                    </uib-tab-heading>
                    <div class="table-responsive">
                        <form class="form">
                            <table class="table table-striped table-evaluate">
                                <thead>
                                    <tr>
                                        <th class="col-xs-6 col-md-7">Pregunta</th>
                                        <th class="col-xs-4 col-md-3">Respuesta</th>
                                        <th class="col-xs-2 col-md-2">Resultado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="(f, field) in fieldset.fields" ng-hide="checkSkipLogic(field)">
                                        <td>
                                            <label>{{ $index+1 }}. {{ field.name }}</label>
                                            <div class="col-md-12">
                                                <ul class="list-group" ng-if="answers[field.id]==type" 
                                                    ng-repeat="(type, predefined_answers) in field.predefined_answers">
                                                    <li class="list-group-item" ng-repeat="(p, predAnswer) in predefined_answers">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" ng-click="saveAlternative(key, field)" ng-model="alternatives[field.id][predAnswer.id]" >{{ predAnswer.detail }}
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <label class="radio-inline radio-answer">
                                                <input type="radio" ng-model="answers[field.id]" value="1" ng-click="save(key, field)"> Si
                                            </label>
                                            <label class="radio-inline radio-answer">
                                                <input type="radio" ng-model="answers[field.id]" value="2" ng-click="save(key, field)"> No
                                            </label>
                                            <label class="radio-inline radio-answer">
                                                <input type="radio" ng-model="answers[field.id]" value="0" ng-click="save(key, field)"> N/A
                                            </label>
                                        </td>
                                        <td class="numero">
                                            {{ (getResult(field)) | number: 0 }}%
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="right">TOTAL</td>
                                        <td class="numero">{{ (getFieldsetTotal(fieldset.key)) | number : 2 }}%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </uib-tab>
            </uib-tabset>
        </div>
        <div class="text-right col-md-offset-7 col-md-5 space-top-3">
            <div class="title-label col-md-8">TOTAL EVALUACIÓN <?php echo strtoupper($evaluation->form->name); ?> </div>
            <div class="total col-md-4"><h3>{{ form.total | number : 2 }}%</h3></div>
        </div>
        <div class="text-right space-top-3">
            <button type="button" class="btn btn-primary" ng-click="finish()">
                Finalizar diagnóstico y agregar observaciones 
                <i class="fa fa-fw fa-chevron-right" aria-hidden="true"></i>
            </button>
        </div>
    </div> <!-- /container -->
</section>