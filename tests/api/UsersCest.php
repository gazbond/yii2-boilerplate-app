<?php

use app\tests\fixtures\UserFixture;
use yii\helpers\Url as Url;

class UsersCest
{
    public function _fixtures()
    {
        return ['users' => UserFixture::className()];
    }

    public function ensureEndpointExists(AcceptanceTester $I)
    {
        $I->sendAjaxGetRequest(Url::toRoute('/api/users'));
        $I->canSeeResponseCodeIs(401);
    }

    public function ensureJwtAuthenticationWorks(AcceptanceTester $I)
    {
        $I->amYii2JwtAuthenticated('root', 'password');
        $I->sendAjaxGetRequest(Url::toRoute('/api/users'));
        $I->canSeeResponseCodeIs(200);
    }
}
