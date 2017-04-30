<?php namespace app\modules\api\controllers;

use app\models\User;
use Yii;
use app\modules\api\components\BaseController;

class UsersController extends BaseController
{
    public $modelClass = 'app\models\User';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['access'] = [
            'class' => 'yii\filters\AccessControl',
            'rules' => [
                [
                    'allow' => true,
                    'actions' => ['options'],
                    'roles' => ['?']
                ],
                [
                    'allow' => true,
                    'actions' => ['index', 'view', 'me'],
                    'roles' => ['@']
                ],
                [
                    'allow' => true,
                    'actions' => ['update', 'create', 'delete'],
                    'roles' => ['admin']
                ]
            ]
        ];
        $behaviors['verbFilter']['actions']['me'] = [
            'GET',
            'HEAD'
        ];
        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        $actions = parent::actions();
        return $actions;
    }

    /**
     * @return array|null|\app\models\User
     */
    public function actionMe()
    {
        return User::find()->where(['id' => Yii::$app->user->id])->one();
    }
}
