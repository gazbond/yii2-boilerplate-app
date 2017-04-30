<?php namespace tests\models;

use dektrium\user\models\LoginForm;
use app\tests\fixtures\UserFixture;
use Codeception\Test\Unit;
use Yii;

class LoginFormTest extends Unit
{
    public function _fixtures()
    {
        return ['users' => UserFixture::className()];
    }

    protected function _after()
    {
        Yii::$app->user->logout();
    }

    public function testLoginNoUser()
    {
        $model = Yii::createObject([
            'class' => LoginForm::className(),
            'login' => 'not_existing_username',
            'password' => 'not_existing_password',
        ]);

        expect_not($model->login());
        expect_that(Yii::$app->user->isGuest);
    }

    public function testLoginWrongPassword()
    {
        $model = Yii::createObject([
            'class' => LoginForm::className(),
            'login' => 'root',
            'password' => 'wrong_password',
        ]);

        expect_not($model->login());
        expect_that(Yii::$app->user->isGuest);
        expect($model->errors)->hasKey('password');
    }

    public function testLoginCorrect()
    {
        $model = Yii::createObject([
            'class' => LoginForm::className(),
            'login' => 'root',
            'password' => 'password',
        ]);

        expect_that($model->login());
        expect_not(Yii::$app->user->isGuest);
        expect($model->errors)->hasntKey('password');
    }

}
