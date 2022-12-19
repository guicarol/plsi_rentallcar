<?php


namespace frontend\tests\Unit;

use frontend\models\Veiculo;
use frontend\tests\UnitTester;

class VeiculoTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    public function testValidacao()
    {
        $veiculo = new Veiculo();

        $veiculo->marca = null;
        $this->assertFalse($veiculo->validate(['marca']));

        $veiculo->modelo = null;
        $this->assertFalse($veiculo->validate(['modelo']));

        $veiculo->combustivel = null;
        $this->assertFalse($veiculo->validate(['combustivel']));

        $veiculo->preco = 'fffff';
        $this->assertFalse($veiculo->validate(['preco']));

        $veiculo->matricula = '9d3dj9dj91jd9j9';
        $this->assertFalse($veiculo->validate(['matricula']));

        $veiculo->descricao = 123;
        $this->assertFalse($veiculo->validate(['descricao']));

        $veiculo->estado = 23;
        $this->assertFalse($veiculo->validate(['estado']));

        $veiculo->tipo_veiculo_id = '9d3dj9dj91jd9j9';
        $this->assertFalse($veiculo->validate(['tipo_veiculo_id']));

        $veiculo->localizacao_id = 'asdasd';
        $this->assertFalse($veiculo->validate(['localizacao_id']));


        $veiculo->marca = 'porsche';
        $veiculo->modelo = 'cayenne';
        $veiculo->combustivel = 'diesel';
        $veiculo->preco = 20 ;
        $veiculo->matricula = '23-ld-23' ;
        $veiculo->descricao = 'teste';
        $veiculo->estado = 'pronto';
        $veiculo->tipo_veiculo_id = 1;
        $veiculo->localizacao_id = 1 ;

        $this->assertTrue($veiculo->validate([$veiculo->marca]));
        $this->assertTrue($veiculo->validate([$veiculo->modelo]));
        $this->assertTrue($veiculo->validate([$veiculo->combustivel]));
        $this->assertTrue($veiculo->validate([$veiculo->preco]));
        $this->assertTrue($veiculo->validate([$veiculo->matricula]));
        $this->assertTrue($veiculo->validate([$veiculo->descricao]));
        $this->assertTrue($veiculo->validate([$veiculo->estado]));
        $this->assertTrue($veiculo->validate([$veiculo->tipo_veiculo_id]));
        $this->assertTrue($veiculo->validate([$veiculo->localizacao_id]));

    }

    public function testSavingVeiculo()
    {
        $veiculo = new Veiculo();
        $veiculo->marca = 'porsche';
        $veiculo->modelo = 'cayenne';
        $veiculo->combustivel = 'diesel';
        $veiculo->preco = 20 ;
        $veiculo->matricula = '23-ld-23' ;
        $veiculo->descricao = 'teste';
        $veiculo->estado = 'pronto';
        $veiculo->tipo_veiculo_id = 1;
        $veiculo->localizacao_id = 1 ;
        $veiculo->save();
        $this->tester->seeRecord('frontend\models\Veiculo', ['modelo' => 'cayenne']);

        $novo = $this->tester->grabRecord('frontend\models\Veiculo', ['modelo' => 'cayenne']);
        $novo->modelo = 'boxster';
        $novo->save();
        $this->tester->seeRecord('frontend\models\Veiculo', ['modelo' => 'boxster']);
        $this->tester->dontSeeRecord('frontend\models\Veiculo', ['modelo' => 'cayenne']);
        $novo->delete();
        $this->tester->dontSeeRecord('frontend\models\Veiculo', ['modelo' => 'boxster']);

    }
}
