<?php

namespace backend\controllers;

use Yii;
use common\models\Subsidiary;
use backend\models\SubsidiarySearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SubsidiaryController implements the CRUD actions for Subsidiary model.
 */
class SubsidiaryController extends Controller
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
     * Lists all Subsidiary models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SubsidiarySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Subsidiary model.
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
     * Creates a new Subsidiary model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Subsidiary();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Subsidiary model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Subsidiary model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Subsidiary the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Subsidiary::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Updates an existing Subsidiary model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpload()
    {
        //$file = UploadedFile::getInstanceByName('file');
        //echo '<pre>'; print_r( Yii::$app->request ); echo '</pre>';
        echo '<pre>'; var_dump( $_REQUEST ); echo '</pre>'; exit;

        $results = ['error' => "asdasdasd asd asd "];

        \Yii::$app->response->format = 'json';
        return $results;
    }
}
