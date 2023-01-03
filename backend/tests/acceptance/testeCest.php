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
        //criar um user com o seu profile, reservar um carro, ver os detalhes aluguer, passar para a conta admin, gerar a fatura, voltar para a nova conta user e ver a fatura
        $I->amOnPage('rentallcar/frontend/web/index');
        $I->wait(3);
        $I->click('Registo');
        $I->wait(3);
        $I->fillField('SignupForm[nome]', 'user');
        $I->fillField('SignupForm[apelido]', 'teste');
        $I->fillField('SignupForm[telemovel]', 999111999);
        $I->fillField('SignupForm[nif]', 999111999);
        $I->fillField('SignupForm[cartaConducao]', 999111999);



        /*$I->amOnPage('rentallcar/backend/web/index');
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'admin12345');
        $I->wait(3);
        $I->click('LoginForm[button]');
        $I->wait(3);
        $I->click('Detalhes aluguer');
        $I->wait(3);*/
    }
}
