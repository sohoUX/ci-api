<?php

namespace frontend\controllers;
use common\models\Subsidiary;
use common\models\Project;
use common\models\Form;
use common\models\Evaluation;

class FormController extends \yii\web\Controller
{
    public function actionIndex($project_id = null, $id = null)
    {	
    	$project = Project::findOne(['id' => $project_id]);
    	$subsidiary = Subsidiary::findOne(['id' => $id]);

        return $this->render('index', ['project' => $project, 'subsidiary' => $subsidiary]);
    }

    public function actionJson($project_id, $id)
    {
    	$consultant = \Yii::$app->user->identity;
        $subsidiary = Subsidiary::findOne($id);
        $project = Project::findOne($project_id);
    	$forms = $project->forms;
    	$results = [];
    	if( !empty($forms) ){
    		foreach( $forms as $i => $form ){
    			$results[$i] = $form->getAttributes();
                $round = $project->currentRound();
                $params = ['project_id' => $project->id, 'form_id' => $form->id, 'subsidiary_id' => $subsidiary->id, 'round_id' => $round->id];
                $evaluation = Evaluation::findOrCreate($params);
                $lastest_evaluation = Evaluation::findLastest($params);
                $results[$i]['evaluation'] = $evaluation;
                $results[$i]['lastest_evaluation'] = $lastest_evaluation;
                $result = 0;
                $last_result = 0;
                if( !empty($evaluation) ){
                    foreach( $evaluation->getAnswers() as $answer ){
                        $value = (!empty($answer['value']))?$answer['value']:0;
                        $result= $result+$value;
                    }
                }
                if( !empty($lastest_evaluation) ){
                    foreach( $lastest_evaluation->getAnswers() as $answer ){
                        $value = (!empty($answer['value']))?$answer['value']:0;
                        $last_result= $last_result+$value;
                    }
                }
                $results[$i]['result'] = $last_result;
                $results[$i]['last_result'] = $result;
    		}
    	}

		\Yii::$app->response->format = 'json';

		return $results;
    }
}
