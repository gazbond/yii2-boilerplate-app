<?php
/**
 * Console application configuration
 */

$config = [
    'id' => 'gazbond/yii2-boilerplate-app',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'app\tests\fixtures'
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info'],
                    'categories' => [
                        'yii\db\*',
                        'yii\web\HttpException:*',
                        'app'
                    ],
                ],
                [
                    'class' => 'app\components\ConsoleLogTarget',
                    'levels' => ['error', 'warning', 'info'],
                    'categories' => [
                        'yii\db\*',
                        'yii\web\HttpException:*',
                        'app'
                    ],
                ],
            ],
        ],
        'settings'=>[
            'class'=>'yii2mod\settings\components\Settings',
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                    ],
                ],
            ],
        ],
        'session' => [
            'class' => 'yii\web\Session'
        ],
        'authManager' => [
            'class' => 'dektrium\rbac\components\DbManager',
        ],
        'db' => require(__DIR__ . '/db.php'),
        'mailer' => require(__DIR__ . '/mail.php'),
        'jwt' => require(__DIR__ . '/jwt.php'),
    ],
    'params' => require(__DIR__ . '/params.php'),
    'modules' => require(__DIR__ . '/modules.php'),
];
if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}
return $config;
