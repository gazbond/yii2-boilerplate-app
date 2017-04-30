<?php

use app\tests\fixtures\UserFixture;
use app\models\User;

class LoginFormCest
{
    public function _fixtures()
    {
        return ['users' => UserFixture::className()];
    }

    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('user/security/login');
    }

    public function openLoginPage(FunctionalTester $I)
    {
        $I->see('Login', 'h3');

    }

    // demonstrates `amLoggedInAs` method
    public function internalLoginById(FunctionalTester $I)
    {
        $I->amLoggedInAs(2);
        $I->amOnPage('/');
        $I->see('root', 'a.dropdown-toggle');
    }

    // demonstrates `amLoggedInAs` method
    public function internalLoginByInstance(FunctionalTester $I)
    {
        $I->amLoggedInAs(User::findIdentity(2));
        $I->amOnPage('/');
        $I->see('root', 'a.dropdown-toggle');
    }

    public function loginWithEmptyCredentials(FunctionalTester $I)
    {
        $I->submitForm('#login-form', [
            'login-form[login]' => '',
            'login-form[password]' => '',
        ]);
        $I->expectTo('see validations errors');
        $I->see('Login cannot be blank.');
        $I->see('Password cannot be blank.');
    }

    public function loginWithWrongCredentials(FunctionalTester $I)
    {
        $I->submitForm('#login-form', [
            'login-form[login]' => 'root',
            'login-form[password]' => 'wrong',
        ]);
        $I->expectTo('see validations errors');
        $I->see('Invalid login or password');
    }

    public function loginSuccessfully(FunctionalTester $I)
    {
        $I->submitForm('#login-form', [
            'login-form[login]' => 'root',
            'login-form[password]' => 'password',
        ]);
        $I->see('root', 'a.dropdown-toggle');
        $I->dontSeeElement('form#login-form');
    }
}