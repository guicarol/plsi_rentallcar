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

        /*
        Login backend
        $I->amOnPage('rentallcar/backend/web/index');
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'admin12345');
        $I->wait(5);
        $I->click('LoginForm[button]');
        $I->wait(5);
        
        $I->click('Registo');
        $I->wait(1);
        $I->fillField('SignupForm[nome]', 'user');
        $I->fillField('SignupForm[apelido]', 'teste');
        $I->fillField('SignupForm[telemovel]', 999111999);
        $I->fillField('SignupForm[nif]', 999111999);
        $I->fillField('SignupForm[cartaConducao]', 99911199911);
        $I->fillField('SignupForm[username]', 'userTeste');
        $I->fillField('SignupForm[email]', 'userTeste@teste.pt');
        $I->fillField('SignupForm[password]', 'userteste123');
        $I->wait(2);
        $I->click(['name' => 'signup-button']);
        $I->wait(3);*/

        $I->click('Login');
        $I->fillField('LoginForm[username]', 'userTeste');
        $I->fillField('LoginForm[password]', 'userteste123');
        $I->click(['name' => 'login-button']);
        $I->wait(1);
        $I->click(['name' => 'btnProcurarVeiculo']);
        $I->wait(1);
        $I->scrollTo(['name' => 'verVeiculo_1']);
        $I->wait(2);
        $I->click(['name' => 'verVeiculo_1']); //ver o carro com o id = 1
        $I->wait(1);
        $I->click(['name' => 'btnReservar']);
        $I->wait(1);
        $I->click(['name' => 'DetalhesAluguer[data_inicio]']);
        $I->wait(1);

        //preencher o form com os dados do aluguer
        $I->fillField(['name' => 'DetalhesAluguer[data_inicio]'], '2023-1-14');
        $I->fillField(['name' => 'DetalhesAluguer[data_fim]'], '2023-1-16');
        $I->selectOption('DetalhesAluguer[seguro_id]', 'Proteção total');
        $I->selectOption('DetalhesAluguer[localizacao_levantamento_id]', 'Leiria');
        $I->selectOption('DetalhesAluguer[localizacao_devolucao_id]', 'Leiria');
        $I->scrollTo(['name' => 'btnCriarDetalhesAluguer']);
        $I->wait(1);
        $I->checkOption('Via-Verde');
        $I->checkOption('Navegador Gps');
        //$I->scrollTo(['name' => 'btnCriarDetalhesAluguer']);
        //$I->wait(1);
        $I->click(['name' => 'btnCriarDetalhesAluguer']);
        $I->wait(5);

        /*
        $I->amOnPage('rentallcar/frontend/web/index');
        $I->wait(1);
        $I->click('As minhas Reservas');
        $I->wait(1);
        */
        
    }
}
