<?php

namespace frontend\controllers;

use Yii;
use common\models\Subsidiary;
use common\models\Project;
use common\models\Form;
use common\models\Evaluation;
use common\models\EvaluationField;
use common\models\EvaluationObservation;
use common\models\Field;

class ObservationsController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function actionJson($evaluation_id){
        $evaluation = Evaluation::findOne($evaluation_id);
        $results = ['observations' => $evaluation->getObservationsValues(), 'next' => $evaluation->nextEvaluation() ];

        \Yii::$app->response->format = 'json';
        return $results;
    }

    public function actionSave($evaluation_id){
        $evaluation = Evaluation::findOne($evaluation_id);
        $params = Yii::$app->request->post();
        $answers = $params['answers'];

        $defaults = EvaluationObservation::getDefaults();
        $results = ['status' => true, 'message' => 'Las observaciones han sido guardadas exitosamente.'];
        foreach( $answers as $answer ){
            $slug = $answer['slug'];
            $evaluationObservation = EvaluationObservation::findOne(['slug' => $slug, 'evaluation_id' => $evaluation->id]);
            if( empty($evaluationObservation) ){
                $def = EvaluationObservation::getDefaults($slug);
                $evaluationObservation = new EvaluationObservation();
                $evaluationObservation->evaluation_id = $evaluation->id;
                $evaluationObservation->slug = $slug;
                $evaluationObservation->name = $def['name'];
            }
            $evaluationObservation->value = $answer['value'];
            //echo '<pre>'; print_r( $evaluationObservation ); echo '</pre>'; exit;
            if( !$evaluationObservation->save() ){
                $results = ['status' => false, 'message' => 'Ha ocurrido un error al intentar guardar las observaciones.'];
                break;
            }
        }

        \Yii::$app->response->format = 'json';
        return $results;
    }

}
