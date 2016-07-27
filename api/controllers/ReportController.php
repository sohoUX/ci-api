<?php
namespace frontend\controllers;

use common\models\Project;
use common\models\Subsidiary;
use common\models\Round;
use common\models\Evaluation;

class ReportController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionJson()
    {
    	$consultant = \Yii::$app->user->identity;
    	$projects = Project::findAll(['consultant_id' => $consultant->id, 'status' => Project::STATUS_OPEN]);
    	$results = [];
    	if( !empty($projects) ){
    		foreach( $projects as $project ){
    			$results[] = [
    				'id' => $project->id,
    				'name' => $project->name,
    				'company' => [
    					'id' => $project->company->id,
    					'name' => $project->company->name,
    					'logo' => $project->company->logo,
					],
    			];
    		}
    	}

		\Yii::$app->response->format = 'json';

		return $results;
    }

    public function actionView($id = null)
    {
        $project = Project::findOne(['id' => $id, 'status' => Project::STATUS_OPEN]);
        if( empty($project) ){
            return $this->redirect(['site/index']);
        }
        return $this->render('view', [ 'project' => $project ]);
    }

    public function actionSubsidiaries($id = null)
    {
        $project = Project::findOne(['id' => $id, 'status' => Project::STATUS_OPEN]);
        \Yii::$app->response->format = 'json';
        $subsidiaries = $project->subsidiaries;
        $results = [];
        if( !empty($subsidiaries) ){
            foreach( $subsidiaries as $subsidiary ){
                $results[] = [
                    'id' => $subsidiary->id,
                    'name' => $subsidiary->name,
                    'address' => $subsidiary->address,
                    'commune' => [
                        'id' => $subsidiary->commune->id,
                        'name' => $subsidiary->commune->name
                    ],
                ];
            }
        }
        $response = ( empty($project))?[]:$results;

        return $response;
    }

    public function actionClosuremeeting($project_id, $subsidiary_id, $round_id){
        $project = Project::findOne( $project_id );
        $subsidiary = Subsidiary::findOne( $subsidiary_id );
        $round = Round::findOne( $round_id );        
        $observation = $project->findClosuremeeting($subsidiary->id);

        return $this->render('closuremeeting', ['project' => $project, 'subsidiary' => $subsidiary, 'observation' => $observation ]);
    }

    public function actionClosuremeetingsave($project_id, $subsidiary_id, $round_id){
        $params = \Yii::$app->request->post();
        $project = Project::findOne( $project_id );
        $subsidiary = Subsidiary::findOne( $subsidiary_id );
        $round = Round::findOne( $round_id );
        $response = $project->saveClosureMeeting($params);
        if( $response ){
            $result = ['status' => true, 'message' => 'El comentario de la reunión de cierre fue guardado exitosamente.'];
        }
        else{
            $result = [
                'status' => true, 
                'message' => 'Ha ocurrido un problema al intentar guardar el comentario de la reunión de cierre.'];
        }

        \Yii::$app->response->format = 'json';

        return $result;
    }

    public function actionSendmemo($project_id, $subsidiary_id, $round_id){
        $params = \Yii::$app->request->post();
        $project = Project::findOne( $project_id );
        $subsidiary = Subsidiary::findOne( $subsidiary_id );
        $round = Round::findOne( $round_id );
        $response = $project->sendMemo($subsidiary, $round, $params);
        if( $response ){
            $result = ['status' => true, 'message' => 'La minuta ha sido enviada con exito.'];
        }
        else{
            $result = [
                'status' => true, 
                'message' => 'Ha ocurrido un problema al intentar enviar la minuta.'
            ];
        }

        \Yii::$app->response->format = 'json';
        
        return $result;
    }

    public function actionReview($project_id, $subsidiary_id, $round_id, $print = null){
        $params = \Yii::$app->request->post();
        
        $print = (!empty($print))?true:false;
        $project = Project::findOne( $project_id );
        $subsidiary = Subsidiary::findOne( $subsidiary_id );
        $round = Round::findOne( $round_id );
        $ep = ['project_id' => $project->id, 'subsidiary_id' => $subsidiary->id, 'round_id' => $round->id];
        $evaluation = Evaluation::findOne($ep);

        return $this->render('review', [ 'project' => $project, 'subsidiary' => $subsidiary, 
            'round' => $round, 'evaluation' => $evaluation, $print ]);
    }

    public function actionReviewjson($project_id, $subsidiary_id, $round_id){
        $params = \Yii::$app->request->post();
        $project = Project::findOne( $project_id );
        $subsidiary = Subsidiary::findOne( $subsidiary_id );
        $round = Round::findOne( $round_id );
        $previous = $round->getPrevious();
        $current = $project->getReviewChartData($subsidiary, $round);
        $lastest = $project->getReviewChartData($subsidiary, $previous);
        $result = [ 'labels' => [], 'data' => [[]], 'observations' => [] ];
        $ep = ['project_id' => $project->id, 'subsidiary_id' => $subsidiary->id, 'round_id' => $round->id];
        $evaluation = Evaluation::findOne($ep);
        if( !empty($evaluation) ){
            $result['observations'] = $evaluation->getObservationsValues();
        }
        
        foreach($current as $i => $form){
            $n = $i+1;
            $result['labels'][] = "{$n}. ".$form['name'];
            $result['data'][0][] = (float)$form['value'];
        }
        if( !empty($lastest) ){
            foreach($lastest as $i => $form){
                $result['data'][1][] = (float)$form['value'];
            }
        }

        \Yii::$app->response->format = 'json';
        
        return $result;
    }

    public function actionDetailjson($project_id, $subsidiary_id, $round_id)
    {
        $project = Project::findOne( $project_id );
        $subsidiary = Subsidiary::findOne( $subsidiary_id );
        $round = Round::findOne( $round_id );
        $previous = $round->getPrevious();
        $results = [];
        foreach( $project->forms as $form ){
            $result = ['id' => $form->id, 'name' => $form->name];
            $current = ['project_id' => $project->id, 'round_id' => $round->id, 'form_id' =>$form->id, 
                'subsidiary_id' => $subsidiary->id];
            if( !empty($previous) ){
                $lastest = ['project_id' => $project->id, 'round_id' => $previous->id, 'form_id' =>$form->id, 
                    'subsidiary_id' => $subsidiary->id];
                $lastestEvaluation = Evaluation::findOne($lastest);
            }
            else{
                $lastestEvaluation = null;
            }
            
            $evaluation = Evaluation::findOne($current);
            $answers = $evaluation->getAnswers();
            $lastAnswers = ($lastestEvaluation)?$lastestEvaluation->getAnswers():null;
            $result['answers'] = $answers;
            $result['last_answers'] = $lastAnswers;
            $results[] = $result;
        }

        \Yii::$app->response->format = 'json';
        return $results;
    }

    public function actionReport($project_id, $subsidiary_id, $round_id){
        $params = \Yii::$app->request->post();
        $project = Project::findOne( $project_id );
        $subsidiary = Subsidiary::findOne( $subsidiary_id );
        $round = Round::findOne( $round_id );
        $ep = ['project_id' => $project->id, 'subsidiary_id' => $subsidiary->id, 'round_id' => $round->id];
        $evaluation = Evaluation::findOne($ep);

        return $this->render('report', [ 'project' => $project, 'subsidiary' => $subsidiary, 
            'round' => $round, 'evaluation' => $evaluation ]);
    }

}
