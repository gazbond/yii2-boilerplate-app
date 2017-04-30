<?php

return [
    'user' => [
        'class' => 'dektrium\user\Module',
        'modelMap' => [
            'User' => 'app\models\User',
        ],
        'adminPermission' => 'admin'
    ],
    'rbac' => [
        'class' => 'dektrium\rbac\Module',
    ],
    'settings' =>  [
        'class'=>'yii2mod\settings\Module',
        'as access' => [
            'class' => 'yii\filters\AccessControl',
            'ruleConfig' => [
                'class' => 'dektrium\user\filters\AccessRule',
            ],
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['admin'],
                ],
            ],
        ],
    ],
    'media' => [
        'class' => 'pendalf89\filemanager\Module',
        'routes' => [
            // Base absolute path to web directory
            'baseUrl' => '',
            // Base web directory url
            'basePath' => '@webroot',
            // Path for uploaded files in web directory
            'uploadPath' => 'uploads',
        ],
        // Thumbnails info
        'thumbs' => [
            'small' => [
                'name' => 'Small',
                'size' => [100, 100],
            ],
            'medium' => [
                'name' => 'Medium',
                'size' => [300, 200],
            ],
            'large' => [
                'name' => 'Large',
                'size' => [500, 400],
            ],
        ],
        'as access' => [
            'class' => 'yii\filters\AccessControl',
            'ruleConfig' => [
                'class' => 'dektrium\user\filters\AccessRule',
            ],
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['admin'],
                ],
            ],
        ],
    ],
    'content' => [
        'class' => 'pendalf89\blog\Module',
        'viewPostUrlCallback' => function ($model) {
            return \yii\helpers\Url::to(['/site/post', 'id' => $model->id]);
        },
        'editorOptions' => [
            'language' => 'en_GB'
        ],
        'as access' => [
            'class' => 'yii\filters\AccessControl',
            'ruleConfig' => [
                'class' => 'dektrium\user\filters\AccessRule',
            ],
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['admin'],
                ],
            ],
        ],
        'controllerMap' => [
            'post' => 'app\theme\content\controllers\PostController'
        ]
    ],
    'api' => [
        'class' => 'app\modules\api\Module',
    ]
];
