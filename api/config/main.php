<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'ci-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'api\controllers',
    'modules' => [
        'admin' => [
            'class' => 'api\modules\admin\AdminModule'
        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request'=>[
            'baseUrl'=>'',
            'class' => '\yii\web\Request',
            'enableCookieValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'response' => [
            'format' => yii\web\Response::FORMAT_JSON,
            'charset' => 'UTF-8',
        ],
        'urlManager'=>[
            'scriptUrl'             => '/index.php',
            'enablePrettyUrl'       => true,
            //'enableStrictParsing' => true,
            'showScriptName'        => false,
            'rules' => array_merge([
                'login'  => 'site/login',
                'logout'  => 'site/logout',
                'GET companies' => 'company/index',
                'request_password_reset' => 'site/requestpasswordreset',
                'reset-password/<token>' => 'site/reset-password',
                'project/<id:\d+>'  => 'project/view',
                
                ], require(__DIR__ . '/../modules/admin/config/rules.php')
            )
        ]
    ],
    'params' => $params,
];
