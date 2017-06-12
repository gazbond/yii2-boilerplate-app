<?php

use yii\helpers\Url as Url;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
 */
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * Define custom actions here
     */

    /**
     * @param $seconds
     */
    public function wait($seconds)
    {
        sleep($seconds);
    }

    /**
     * Use Yii2 login form to get JWT token and set in Bearer header.
     */
    public function amYii2JwtAuthenticated($login, $password)
    {
        codecept_debug('LOOK HERE AcceptanceTester->amYii2JwtAuthenticated()');

        $this->amOnPage(Url::toRoute('/user/security/login'));
        $this->submitForm('#login-form', [
            'login-form[login]' => $login,
            'login-form[password]' => $password
        ]);
        $token = $this->grabCookie('jwt');
        $this->setHeader('Authorization', 'Bearer ' . $token);
    }
}
