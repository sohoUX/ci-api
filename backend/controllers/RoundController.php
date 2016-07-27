<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use common\models\Round;
use common\models\Project;
use common\models\Subsidiary;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class RoundController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionModal($round_id)
    {
        $model = Round::findOne($round_id);
        $post = Yii::$app->request->post();
        $alert = false;
        if( Yii::$app->request->getIsPost() && !empty($post) && !empty($post['consultant']) ){
            $consultants = $post['consultant'];
            foreach( $consultants as $id => $consultant ){
                $subsidiaries = explode(",", $consultant['subsidiaries']);
                $consultants[$id]['enable'] = ($consultant['enable'])?true:false;
                $consultants[$id]['subsidiaries'] = $subsidiaries;
            }
            $model->saveConsultants($consultants);
            $alert = true;
        }
        $project = Project::findOne($model->project_id);
        $consultants = User::findConsultants();
        $this->layout = false;
        $subsidiaries = Subsidiary::find([ 'company_id' => $project->company_id ])
        ->orderBy('name')
        ->all();

        return $this->render('modal', [ 
            'round' => $model,
            'consultants' => $consultants, 
            'subsidiaries' => $subsidiaries,
            'alert' => $alert
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $round_id
     * @return mixed
     */
    public function actionView($round_id)
    {
        $model = Round::findOne($round_id);
        $post = Yii::$app->request->post();
        $alert = false;
        if( Yii::$app->request->getIsPost() && !empty($post) && !empty($post['consultant']) ){
            $consultants = $post['consultant'];
            $model->saveConsultants($consultants);
            $alert = true;
        }
        $project = Project::findOne($model->project_id);
        $consultants = User::findConsultants();
        $this->layout = false;
        $subsidiaries = Subsidiary::find([ 'company_id' => $project->company_id ])
        ->orderBy('name')
        ->all();

        return $this->render('view', [ 
            'round' => $model,
            'consultants' => $consultants, 
            'subsidiaries' => $subsidiaries,
            'alert' => $alert
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        $post = Yii::$app->request->post();

        if( $model->load($post) ){
            $model->type = 1;
            if( !empty($post['User']) && !empty($post['User']['password'])){
                $model->setPassword($post['User']['password']);
                $model->generateAuthKey();
            }
            try{
                if( $model->save() ){
                    $model->avatar = UploadedFile::getInstance($model, 'avatar');
                    if( !empty($model->avatar) && $model->upload() === false) {
                        return $this->render('update', [ 'model' => $model ]);
                    }
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
            catch(yii\db\IntegrityException $e){
                $model->addError('all', ["Falta información."]);
                return $this->render('create', [ 'model' => $model ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $post = Yii::$app->request->post();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if( !empty($post['User']) && !empty($post['User']['password'])){
                $model->setPassword($post['User']['password']);
                $model->generateAuthKey();
                $model->save();
            }
            $model->avatar = UploadedFile::getInstance($model, 'avatar');
            if(  !empty($model->avatar) && $model->upload() === false) {
                return $this->render('update', [ 'model' => $model ]);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
