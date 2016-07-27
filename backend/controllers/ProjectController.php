<?php

namespace backend\controllers;

use Yii;
use common\models\Project;
use common\models\Subsidiary;
use common\models\File;
use backend\models\ProjectSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Project models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Project model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Project();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $params = Yii::$app->request->post('Project');
            if( !empty($params['subsidiaries']) ){
                $model->linkSubsidiaries($params['subsidiaries']);
            }
            if( !empty($params['forms']) ){
                $model->linkForms($params['forms']);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $params = Yii::$app->request->post('Project');
            if( !empty($params['subsidiaries']) ){
                $model->linkSubsidiaries($params['subsidiaries']);
            }
            if( !empty($params['rounds']) ){
                $model->linkRounds($params['rounds']);
            }
            if( !empty($params['forms']) ){
                $model->linkForms(
                    $params['forms'], 
                    $params['form_percentages'], 
                    $params['form_positions']
                );
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Project model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionReports($id)
    {
        $model = $this->findModel($id);
        $results = [];
        if( $model ){
            $evaluations = $model->evaluations;
            foreach( $evaluations as $i => $evaluation ){
                $results[$i] = $evaluation->getAttributes();
                $results[$i]['round'] = $evaluation->round->getAttributes();
                $results[$i]['form'] = $evaluation->form->getAttributes();
                $results[$i]['result'] = $evaluation->getResult();
                $results[$i]['consultant'] = $evaluation->consultant->getAttributes();
                $report = $evaluation->getLastReport();
                if( !empty($report) ){
                    $results[$i]['report'] = $report->getAttributes();
                    $results[$i]['report']['path'] = Url::to(["project/evaluation-report", "hash" => $report->hash]);
                }
                
            }
        }

        \Yii::$app->response->format = 'json';
        return $results;
    }

    public function actionEvaluationReport($hash)
    {
        if (($report = File::findOne(['hash' => $hash])) !== null) {
            $source = "{$report->source}/{$report->hash}";
            return Yii::$app->response->sendFile($source, $report->name, [ 'mimeType' => $report->getMimeType() ]);
        } else {
            throw new NotFoundHttpException('Este reporte no existe.');
        }
    }

    public function actionRoundDelete($id, $round_id)
    {
        $project = $this->findModel($id);
        if( !empty($project) ) {
            $source = "{$report->source}/{$report->hash}";
            return Yii::$app->response->sendFile($source, $report->name, [ 'mimeType' => $report->getMimeType() ]);
        } else {
            throw new NotFoundHttpException('Este reporte no existe.');
        }
    }
}
