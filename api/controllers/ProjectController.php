<?php
namespace api\controllers;

use common\helpers\Pdf;
use common\models\Project;
use yii\helpers\Url;

class ProjectController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        $projects = Project::my();

        return $projects;
    }

    public function actionView($id = null)
    {
        $project = Project::findOne(['id' => $id, 'status' => Project::STATUS_OPEN]);
        if( empty($project) ){
            return $this->redirect(['/']);
        }
        return $this->render('view', [ 'project' => $project ]);
    }

    public function actionSubsidiaries($id = null)
    {
        $project = Project::findOne(['id' => $id, 'status' => Project::STATUS_OPEN]);
        $consultant = \Yii::$app->user->identity;
        $subsidiaries = $consultant->getSubsidiaries($project->id);
        //echo '<pre>'; print_r( $subsidiaries ); echo '</pre>'; exit;
        \Yii::$app->response->format = 'json';
        $results = [];
        if( !empty($subsidiaries) ){
            foreach( $subsidiaries as $subsidiary ){
                $results[] = [
                    'id' => $subsidiary->id,
                    'name' => $subsidiary->name,
                    'address' => $subsidiary->address,
                    'commune' => [
                        'id' => $subsidiary->province->id,
                        'name' => $subsidiary->province->name
                    ],
                    'location' => false //$subsidiary->getLocation()
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
        $roundObservation = $project->findClosuremeeting($subsidiary->id);

        return $this->render('closuremeeting', ['project' => $project, 'subsidiary' => $subsidiary, 
            'roundObservation' => $roundObservation ]);
    }

    public function actionClosuremeetingsave($project_id, $subsidiary_id, $round_id){
        $params = \Yii::$app->request->post();
        $project = Project::findOne( $project_id );
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
        $ep = ['project_id' => $project->id, 'subsidiary_id' => $subsidiary_id, 'round_id' => $round->id ];
        $evaluation = Evaluation::findOne($ep);
        $report = $this->createReport($project->id, $subsidiary->id, $round->id, true);
        $response = $project->sendMemo($subsidiary, $round, $params, $report);
        if( !empty($report) ){
            $report->delete();
        }
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

    public function actionReview($project_id, $subsidiary_id, $round_id, $print = false){
        $params = \Yii::$app->request->post();
        
        $print = (!empty($print))?true:false;
        $project = Project::findOne( $project_id );
        $subsidiary = Subsidiary::findOne( $subsidiary_id );
        $round = Round::findOne( $round_id );
        $ep = ['project_id' => $project->id, 'subsidiary_id' => $subsidiary->id, 'round_id' => $round->id];
        $evaluation = Evaluation::findOne($ep);

        return $this->render('review', [ 'project' => $project, 'subsidiary' => $subsidiary, 
            'round' => $round, 'evaluation' => $evaluation, 'print' => false ]);
    }
    public function actionReviewprint($project_id, $subsidiary_id, $round_id, $is_summary = false){
        $params = \Yii::$app->request->post();
        $print = (!empty($print))?true:false;
        $project = Project::findOne( $project_id );
        $subsidiary = Subsidiary::findOne( $subsidiary_id );
        $round = Round::findOne( $round_id );
        $ep = ['project_id' => $project->id, 'subsidiary_id' => $subsidiary->id, 'round_id' => $round->id];
        $evaluation = Evaluation::findOne($ep);
        $this->layout="print";
        $reviewJson = $this->actionReviewjson($project_id, $subsidiary_id, $round_id, true);
        $detailJson = $this->actionDetailjson($project_id, $subsidiary_id, $round_id, true);
        //echo '<pre>'; print_r( $reviewJson ); echo '</pre>'; exit;

        $template = (!$is_summary)?'review-print':'review-print-summary';
        return $this->render($template, [ 'project' => $project, 'subsidiary' => $subsidiary, 'round' => $round, 
            'evaluation' => $evaluation, 'review' => $reviewJson, 'details' => $detailJson, 'print' => true ]);
    }


    private function createReport($project_id, $subsidiary_id, $round_id, $is_summary = false){
        $path = Url::to(["project/reviewprint", 'project_id' => $project_id, 
            'subsidiary_id' => $subsidiary_id, 'round_id' => $round_id], true);
        if( $is_summary ){
            $path = $path."/1";
        }
        $pdf = Pdf::createFromUrl($path);
        $ep = ['project_id' => $project_id, 'subsidiary_id' => $subsidiary_id, 'round_id' => $round_id];
        if($pdf->process() === true ){
            $evaluation = Evaluation::findOne($ep);
            $project = Project::findOne($project_id);
            $subsidiary = Subsidiary::findOne($subsidiary_id);
            $project_slug = $project->getSlug();
            $sub_slug = $subsidiary->getSlug();
            $temp = $pdf->getTempFile();
            $file = new File();
            $file->name = "{$project_slug}_{$sub_slug}_".date('d.m.Y').".pdf";
            $file->type = File::TYPE_PDF;
            $file->setSourceFile($temp);
            $file->setEntity( $evaluation );
            if( $file->save() ){
                return $file;
            }
        }

        return false;
    }


    public function actionReviewjson($project_id, $subsidiary_id, $round_id, $return = false){
        $params = \Yii::$app->request->post();
        $project = Project::findOne( $project_id );
        $subsidiary = Subsidiary::findOne( $subsidiary_id );
        $round = Round::findOne( $round_id );
        $previous = $round->getPrevious();
        $current = $project->getReviewChartData($subsidiary, $round);
        $lastest = $project->getReviewChartData($subsidiary, $previous);
        $result = [ 'labels' => [], 'data' => [[],[]], 'observations' => [] ];
        $ep = ['project_id' => $project->id, 'subsidiary_id' => $subsidiary->id, 'round_id' => $round->id];
        $evaluation = Evaluation::findOne($ep);
        if( !empty($evaluation) ){
            $pro = ProjectRoundObservation::findOne($ep);
            if( !empty($pro) ){
                $result['observations'] = $pro->getObservations();
            }
        }

        $labels = $currentData = $lastestData = [];
        foreach($current as $i => $form){
            $n = $i+1;
            $lt_percent = (!empty($lastest[$i]) && !empty($lastest[$i]->percent))?$lastest[$i]->percent:0;
            $labels[$i] = "{$n}. ".$form->name;
            $currentData[$i] = [(float)$form->percent, $n];
            $lastestData[$i] = [(float)$lt_percent, $n];
        }
        /**
         * @desc: Se revierten estos valores debido a que el plñugin de jqplot
         * los despliega de abajo hacia arriba 
         */
        //$labels = array_reverse($labels);
        //$currentData = array_reverse($currentData);
        //$lastestData = array_reverse($lastestData);

        $result['labels'] = $labels;
        $result['data'] = [ $lastestData, $currentData ];

        if( !$return ){
            \Yii::$app->response->format = 'json';
        }
        
        return $result;
    }

    public function actionDetailjson($project_id, $subsidiary_id, $round_id, $return = false)
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
            $result['observations'] = $evaluation->getObservationsValues();
            $result['result'] = $evaluation->getResult();
            $result['last_result'] = ($lastestEvaluation)?$lastestEvaluation->getResult():null;
            $results[] = $result;
        }

        if( !$return ){
            \Yii::$app->response->format = 'json';
        }
        return $results;
    }

    public function actionReport($project_id, $subsidiary_id, $round_id){
        $params = \Yii::$app->request->post();
        $project = Project::findOne( $project_id );
        $subsidiary = Subsidiary::findOne( $subsidiary_id );
        $round = Round::findOne( $round_id );
        $ep = ['project_id' => $project->id, 'subsidiary_id' => $subsidiary->id, 'round_id' => $round->id];
        $evaluation = Evaluation::findOne($ep);
        $lastestEvaluation = null;
        $lastestRound = $round->getPrevious();
        if( !empty($lastestRound) ){
            $ep['round_id'] = $lastestRound->id;
            $lastestEvaluation = Evaluation::findOne($ep);
        }

        
        if( $report = $this->createReport($project_id, $subsidiary_id, $round_id) ){
            $consultant = \Yii::$app->user->identity;
            $consultant->sendReport($project, $subsidiary, $round, $report);
        }


        return $this->render('report', [ 'project' => $project, 'subsidiary' => $subsidiary, 
            'round' => $round, 'evaluation' => $evaluation, 'lastest_evaluation' => $lastestEvaluation ]);
    }
    
    public function actionSendreport($project_id, $subsidiary_id, $round_id){
        $ep = ['project_id' => $project_id, 'subsidiary_id' => $subsidiary_id, 'round_id' => $round_id];
        $params = \Yii::$app->request->post();
        $evaluation = Evaluation::findOne($ep);
        $response = ['error' => "Ha ocurrido un error al tratar de enviar la minuta, por favor intenta mas tarde."];
        if( $report = $this->createReport($project_id, $subsidiary_id, $round_id, true) ){
            $consultant = \Yii::$app->user->identity;
            if( !empty($evaluation) && !empty($params['targets']) ){
                if( $evaluation->sendReport($params['targets']) ){
                    $response = ['success' => "La minuta ha sido enviada con exito."];
                }
            }
        }
        
        \Yii::$app->response->format = 'json';

        return $response;
    }


}