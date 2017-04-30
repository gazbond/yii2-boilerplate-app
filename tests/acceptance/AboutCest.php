<?php

use yii\helpers\Url as Url;
use app\tests\fixtures\PostFixture;

class AboutCest
{
    public function _fixtures()
    {
        return ['posts' => PostFixture::className()];
    }

    public function ensureThatAboutWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/about'));
        $I->see('About Company Name', 'h1');
    }
}
