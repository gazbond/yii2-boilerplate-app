<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\ContactForm;
use pendalf89\blog\models\Post;
use yii\web\HttpException;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionContact()
    {
        $post = Post::find()->where(['alias' => 'Contact'])->one();
        if($post === null) {
            throw new HttpException(404);
        }

        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
            'post' => $post
        ]);
    }

    public function actionAbout()
    {
        $model = Post::find()->where(['alias' => 'About'])->one();
        if($model === null) {
            throw new HttpException(404);
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionBlog()
    {

    }

    public function actionPost($id)
    {
        $model = Post::findOne($id);
        if($model === null) {
            throw new HttpException(404);
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }
    
    public function actionAngular()
    {
        return $this->render('angular', [
            'identity' => Yii::$app->user->identity,
        ]);
    }
}
