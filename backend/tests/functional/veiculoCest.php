<?php


namespace backend\tests\Functional;

use backend\tests\FunctionalTester;
use common\models\User;

class veiculoCest
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

    public function veiculoEmptyFields(FunctionalTester $I)
    {
        $I->click('Veiculos');
        $I->click('Create Veiculo');
        $I->click('Save');
        $I->see('Marca cannot be blank', 'div');
        $I->see('Modelo cannot be blank', 'div');

        $I->see('Combustivel cannot be blank', 'div');
        $I->see('Preco cannot be blank', 'div');
        $I->see('Matricula cannot be blank', 'div');
        $I->see('Descricao cannot be blank', 'div');
        $I->see('Estado cannot be blank', 'div');
        $I->see('Categoria cannot be blank', 'div');
        $I->see('Localizacao carro cannot be blank', 'div');
        $I->see('Franquia cannot be blank', 'div');
    }

    public function createVeiculo(FunctionalTester $I)
    {
        $I->amLoggedInAs(User::findByUsername('admin'));

        $I->click('Veiculos');
        $I->click('Create Veiculo');

        //form
        $I->fillField('Veiculo[marca]', 'Teste');
        $I->fillField('Veiculo[modelo]', 'Teste');
        $I->selectOption('Veiculo[combustivel]', 'diesel');
        $I->fillField('Veiculo[preco]', '12.34');
        $I->fillField('Veiculo[matricula]', '99-ZZ-99');
        $I->fillField('Veiculo[descricao]', 'Teste descricao');
        $I->selectOption('Veiculo[estado]', 'pronto');
        $I->selectOption('Veiculo[tipo_veiculo_id]', '2');
        $I->selectOption('Veiculo[localizacao_id]', '1');
        $I->fillField('Veiculo[franquia]', '123');
        $I->attachFile('input[type="file"]', 'random.jpg');

        //$I->click(['name' => 'btnCriarVeiculo']);     
        $I->click('Save');
        
        $I->dontSee('cannot be blank');

        $I->seeRecord('common\models\Veiculo', ['marca' => 'Teste', 'modelo' => 'Teste']);

    }
}
