<?php


namespace backend\tests\Functional;

use backend\tests\FunctionalTester;
use common\models\User;

class extraCest
{
    public function _before(FunctionalTester $I)
    {
        //efetuar o login no backend
        $I->amOnRoute('/');
        $I->see('Sign in to start your session','p');

        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'admin12345');
        $I->click('LoginForm[button]');

        $I->see('Página inicial');
    }

    // tests
    public function extraEmptyFields(FunctionalTester $I)
    {
        $I->click('Extras');
        $I->click('Create Extra');
        $I->click('Save');
        $I->see('Descricao cannot be blank.', 'div');
        $I->see('Preco cannot be blank.', 'div');
    }

    public function createExtra(FunctionalTester $I)
    {
        $I->click('Extras');
        $I->click('Create Extra');
        $I->fillField('Extra[descricao]', 'Teste');
        $I->fillField('Extra[preco]', '12');
        $I->click('Save');
        $I->dontSee('cannot be blank');
        $I->seeRecord('common\models\Extra', ['descricao' => 'Teste', 'preco' => '12']);

    }
}
