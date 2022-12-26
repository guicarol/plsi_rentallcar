<?php


namespace backend\tests\Acceptance;

use backend\tests\AcceptanceTester;

class testeCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('rentallcar/backend/web/index');
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'admin12345');
        $I->wait(5);
        $I->click('LoginForm[button]');
        $I->wait(5);
    }
}
