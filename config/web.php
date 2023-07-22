<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        // 'timeZone' => 'Asia/Kolkata', 
        // 'authManager' => [
        //     'class' => 'yii\rbac\DbManager',
        //     'db' => 'db'
        // ],
        // 'db' => $db,
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'vaibhavi',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            // 'class' => 'webvimark\modules\UserManagement\components\UserConfig',
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],],
        'authManager' => [
               
                        'class' => 'yii\rbac\DbManager',
                        'DefaultRoles' => ['guest'], 
                        //'db' => $db,
        ],
        'security' => [
            'passwordHashCost' => 12,
        ],
        'db' => $db,
        'formatter' => [
            'dateFormat' => 'php:Y-m-d', // Adjust the date format as needed
            'datetimeFormat' => 'php:h:i:s A \, d-m-Y', // Adjust the datetime format as needed
            'timeZone' => 'Asia/Kolkata', // Set the timezone to 'Asia/Kolkata'
        ],
        
        // 'urlManager' => [
        //     'enablePrettyUrl' => true,
        //     'showScriptName' => false,
        //     'rules' => [
        //     ],
        // ],
        
    ],    
    'controllerMap' => [
        'contractor' => 'app\controllers\ContractorController',
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
