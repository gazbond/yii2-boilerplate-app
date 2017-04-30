<?php
/**
 * Application configuration for testing
 */
$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/web.php'),
    [
        'components' => [
            'db' => require(__DIR__ . '/test-db.php'),
            'mailer' => [
                'useFileTransport' => true
            ],
            'urlManager' => [
                'showScriptName' => true,
                'enablePrettyUrl' => false
            ],
            'request' => [
                'enableCsrfValidation' => false
            ]
        ],
    ]
);
$config['components']['log']['targets'] = [
    [
        'class' => 'yii\log\FileTarget',
        'levels' => ['error', 'warning', 'info', 'trace'],
        'logVars' => [],
        'categories' => [
            'yii\web\HttpException:*',
            'application',
            'jwt'
        ],
    ],
    [
        'class' => 'app\components\ConsoleLogTarget',
        'levels' => ['error', 'warning', 'info', 'trace'],
        'logVars' => [],
        'categories' => [
            'yii\web\HttpException:*',
            'application',
            'jwt'
        ],
    ],
];
return $config;