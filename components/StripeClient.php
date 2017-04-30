<?php namespace app\components;

/**
 * User: gazbond
 * Date: 02/06/2015
 * Time: 21:23
 */

use yii\authclient\OAuth2;
use Yii;

class StripeClient extends OAuth2
{
    /**
     * @inheritdoc
     */
    public $authUrl = 'https://connect.stripe.com/oauth/authorize';

    /**
     * @inheritdoc
     */
    public $tokenUrl = 'https://connect.stripe.com/oauth/token';

    /**
     * @inheritdoc
     */
    public $scope = 'read_write';

    /**
     * @inheritdoc
     */
    public $apiBaseUrl = 'https://api.stripe.com';

    /**
     * @inheritdoc
     */
    protected function defaultName()
    {
        return 'stripe';
    }

    /**
     * @inheritdoc
     */
    protected function defaultTitle()
    {
        return 'Stripe';
    }
} 