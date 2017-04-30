<?php namespace tests\models;

use app\models\User;
use app\tests\fixtures\UserFixture;
use Lcobucci\JWT\Token;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use yii\helpers\Url;
use Yii;
use Codeception\Test\Unit;

class UserTest extends Unit
{
    public function _fixtures()
    {
        return ['users' => UserFixture::className()];
    }

    public function testFindUserById()
    {
        expect_that($user = User::findIdentity(2));
        expect($user->username)->equals('root');

        expect_not(User::findIdentity(999));
    }

    public function testFindUserByAccessToken()
    {
        $signer = new Sha256();

        /* @var Token $token */
        $token = Yii::$app->jwt->getBuilder()
            ->setIssuer(Url::home(true))
            ->setAudience(Url::home(true))
            ->setIssuedAt(time())
            ->setExpiration(time() + 3600)
            ->set('user_id', 2)
            ->sign($signer, Yii::$app->jwt->key)
            ->getToken();

        expect_that($user = User::findIdentityByAccessToken($token));
        expect($user->username)->equals('root');

        /* @var Token $token */
        $token = Yii::$app->jwt->getBuilder()
            ->setIssuer(Url::home(true))
            ->setAudience(Url::home(true))
            ->setIssuedAt(time())
            ->setExpiration(time() + 3600)
            ->set('user_id', 999)
            ->sign($signer, Yii::$app->jwt->key)
            ->getToken();

        expect_not(User::findIdentityByAccessToken($token));
    }

    public function testFindUserByUsername()
    {
        expect_that($user = User::findOne(['username' => 'root']));
        expect_not(User::findOne(['username' => 'not-root']));
    }

    /**
     * @depends testFindUserByUsername
     */
    public function testValidateUser()
    {
        $user = User::findIdentity(2);
        expect_that($user->validateAuthKey($user->auth_key));
        expect_not($user->validateAuthKey('not-auth-key'));
    }

}
