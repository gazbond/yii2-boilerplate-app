<?php namespace app\controllers;

use Yii;
use yii\web\Controller;
use dektrium\user\models\Account;
use  yii\helpers\Json;

/**
 * Social auth controller for User module
 */
class StripeController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['access'] = [
            'class' => 'yii\filters\AccessControl',
            'rules' => [
                [
                    'allow' => true,
                    'actions' => ['connect'],
                    'roles' => ['@']
                ]
            ]
        ];
        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'connect' => [
                'class' => 'app\components\AuthAction',
                'clientId' => 'stripe',
                'successCallback' => [$this, 'connectCallback'],
                'successUrl' => Yii::$app->homeUrl . 'user/settings/network',
            ],
        ];
    }

    /**
     * @param \app\components\StripeClient $client
     */
    public function connectCallback($client)
    {
        $account = Account::find()->where([
            'user_id' => Yii::$app->user->id,
            'provider' => 'stripe'
        ])->one();
        if ($account === null) {
            $account = new Account();
            $account->provider = 'stripe';
            $account->user_id = Yii::$app->user->id;
        }
        $accessToken = $client->getAccessToken();
        $account->client_id = $accessToken->params['stripe_user_id'];
        $account->code = $accessToken->params['token'];
        $account->data = Json::encode($accessToken);
        $account->save();
    }
}