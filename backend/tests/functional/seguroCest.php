<?php


namespace backend\tests\Functional;

use backend\tests\FunctionalTester;
use common\models\User;


class seguroCest
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

    public function seguroEmptyFields(FunctionalTester $I)
    {
        $I->click('Seguros');
        $I->click('Create Seguro');
        $I->click('Save');
        $I->see('Marca cannot be blank', 'div');
        $I->see('Cobertura cannot be blank', 'div');
        $I->see('Preco cannot be blank', 'div');

    }

    public function createSeguro(FunctionalTester $I)
    {
        $I->amLoggedInAs(User::findByUsername('admin'));

        $I->click('Seguros');
        $I->click('Create Seguro');

        //form
        $I->fillField('Seguro[marca]', 'Teste');
        $I->fillField('Seguro[cobertura]', 'Teste');
        $I->fillField('Seguro[preco]', '12');
  
        $I->click('Save');
        
        $I->dontSee('cannot be blank');

        $I->seeRecord('common\models\Seguro', ['marca' => 'Teste', 'cobertura' => 'Teste', 'preco' => '12']);

    }
}
