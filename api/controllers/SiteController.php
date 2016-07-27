<?php
namespace api\controllers;

use Yii;
use common\models\LoginForm;
use common\models\User;
use api\models\PasswordResetRequestForm;
use api\models\ResetPasswordForm;
use api\models\SignupForm;
use api\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $enableCsrfValidation = false;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        if( !empty(Yii::$app->user->identity) ){
            return $this->render('index');
        }
        else{
            $message = "El token no ha sido encontrado";
            return [ 'type' => 'error', 'message' => $message ];
        }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return ['token' => Yii::$app->user->identity->auth_key];
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return ['token' => Yii::$app->user->identity->auth_key];
        }
        else{
            $message = "El usuario o la contraseña es invalido.";
            $params = Yii::$app->request->post('LoginForm');
            $user = User::findOne(['username' => $params['username'] ]);
            if( $user ){
                if( $user->validatePassword( $params['username'] )){
                    if( $user->type == User::TYPE_CONSULTANT ){
                        $message = "El usuario no tiene acceso a esta plataforma.";
                    }
                }
            }

            return [ 'message' => $message ];
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
