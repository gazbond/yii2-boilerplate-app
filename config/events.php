<?php

use dektrium\user\controllers\SecurityController;
use yii\base\Event;
use yii\web\Cookie;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use yii\helpers\Url;

Event::on(SecurityController::className(), SecurityController::EVENT_AFTER_LOGIN, function (Event $e) {

    /** @var app\models\User $user */
    $user = Yii::$app->user->identity;
    $signer = new Sha256();
    /** @var Lcobucci\JWT\Token $token */
    $token = Yii::$app->jwt->getBuilder()
        ->setIssuer(Url::home(true))
        ->setAudience(Url::home(true))
        ->setIssuedAt(time())
        ->setExpiration(time() + 3600)
        ->set('user_id', $user->id)
        ->sign($signer, Yii::$app->jwt->key)
        ->getToken();
    $token = (string) $token;
    Yii::$app->response->headers->add('Authorization', $token);
    Yii::$app->response->cookies->add(new Cookie([
        'name' => 'jwt',
        'value' => $token,
        'httpOnly' => false
    ]));
});

Event::on(SecurityController::className(), SecurityController::EVENT_AFTER_LOGOUT, function (Event $e) {
    Yii::$app->response->cookies->remove('jwt');
});