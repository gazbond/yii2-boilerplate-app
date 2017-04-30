<?php

use yii\helpers\Url as Url;
use app\tests\fixtures\PostFixture;

class HomeCest
{
    public function _fixtures()
    {
        return ['posts' => PostFixture::className()];
    }

    public function ensureThatHomePageWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
        $I->see('Yii2 boilerplate app');
        
        $I->seeLink('About');
        $I->click('About');
        $I->wait(2); // wait for page to be opened

        $I->see('About Company Name', 'h1');
    }
}
