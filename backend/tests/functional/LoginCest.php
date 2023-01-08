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

    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('/');
        $I->see('Sign in to start your session','p');
    }

    public function loginEmptyFields(FunctionalTester $I)
    {
        $I->click('Sign In');
        $I->see('Username cannot be blank');
        $I->see('Password cannot be blank');
    }

    public function loginWrongPassword(FunctionalTester $I)
    {
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'admin1234567');
        $I->click('Sign In');
        $I->see('Incorrect username or password.');
    }

    public function loginWrongRole(FunctionalTester $I)
    {
        $I->fillField('LoginForm[username]', 'user');
        $I->fillField('LoginForm[password]', 'user12345');
        $I->click('Sign In');
        $I->amOnRoute('/');
    }

    public function loginUser(FunctionalTester $I)
    {
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'admin12345');
        $I->click('LoginForm[button]');

        $I->see('Página inicial');
    }
}
