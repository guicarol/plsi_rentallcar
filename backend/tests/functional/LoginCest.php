<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

/**
 * Class LoginCest
 */
class LoginCest
{
    /**
     * Load fixtures before db transaction begin
     * Called in _before()
     * @see \Codeception\Module\Yii2::_before()
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @return array
     */

    
    /**
     * @param FunctionalTester $I
     */
    public function loginUser(FunctionalTester $I)
    {
        //$I->amOnPage('/login');
        $I->amOnRoute('site/login');
        $I->see('Sign in');
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'admin12345');
        $I->click('LoginForm[button]');


        //$I->amOnRoute('/index');

        $I->see('Página inicial');
        /*$I->dontSeeLink('Login');
        $I->dontSeeLink('Signup');*/
    }
}
