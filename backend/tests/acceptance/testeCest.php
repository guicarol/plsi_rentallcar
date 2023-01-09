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
        $I->amOnPage('rentallcar/backend/web/site/login');
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'admin12345');
        $I->wait(2);
        $I->click('LoginForm[button]');
        $I->wait(2);

        //$I->see('Sign in to start your session','p');

        $I->click('Veiculos');
        $I->click('Create Veiculo');
        $I->click(['name' => 'btnCriarVeiculo']);
        $I->wait(5);
        
    }
}
