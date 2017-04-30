<?php
/**
 * User: gazbond
 * Date: 03/06/2015
 * Time: 19:47
 */

namespace app\components;

use Yii;

class AuthAction extends \yii\authclient\AuthAction
{
    public $clientId;

    /**
     * @inheritdoc
     */
    public function run()
    {
        $collection = Yii::$app->get($this->clientCollection);
        $client = $collection->getClient($this->clientId);
        return $this->auth($client);
    }
} 