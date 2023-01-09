<?php


namespace backend\tests\Unit;

use common\models\Veiculo;
use backend\tests\UnitTester;

class VeiculoTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }


    public function testDataNull(){

        $veiculo = new Veiculo();

        //testar com dados null

        $veiculo->marca = null;
        $this->assertFalse($veiculo->validate(['marca']));

        $veiculo->modelo = null;
        $this->assertFalse($veiculo->validate(['modelo']));

        $veiculo->combustivel = null;
        $this->assertFalse($veiculo->validate(['combustivel']));

        $veiculo->franquia = null;
        $this->assertFalse($veiculo->validate(['franquia']));

        $veiculo->preco = null;
        $this->assertFalse($veiculo->validate(['preco']));

        $veiculo->matricula = null;
        $this->assertFalse($veiculo->validate(['matricula']));

        $veiculo->descricao = null;
        $this->assertFalse($veiculo->validate(['descricao']));

        $veiculo->estado = null;
        $this->assertFalse($veiculo->validate(['estado']));

        $veiculo->tipo_veiculo_id = null;
        $this->assertFalse($veiculo->validate(['tipo_veiculo_id']));

        $veiculo->localizacao_id = null;
        $this->assertFalse($veiculo->validate(['localizacao_id']));
    }

    public function testWrongData(){

        $veiculo = new Veiculo();

        //testar com dados de tipo errados

        $veiculo->preco = 'fffff';
        $this->assertFalse($veiculo->validate(['preco']));

        $veiculo->descricao = 123;
        $this->assertFalse($veiculo->validate(['descricao']));

        //$veiculo->estado = 'estado';
        //$this->assertFalse($veiculo->validate(['estado']));

        $veiculo->estado = 23;
        $this->assertFalse($veiculo->validate(['estado']));

        $veiculo->tipo_veiculo_id = '9d3dj9dj91jd9j9';
        $this->assertFalse($veiculo->validate(['tipo_veiculo_id']));

        $veiculo->localizacao_id = 'asdasd';
        $this->assertFalse($veiculo->validate(['localizacao_id']));

        $veiculo->franquia = 'asdasd';
        $this->assertFalse($veiculo->validate(['franquia']));
    }

    public function testLongData(){

        $veiculo = new Veiculo();

        //testar com dados demasiado longos
        
        //$veiculo->preco = 123456.234;
        //$this->assertFalse($veiculo->validate(['preco']));

        $veiculo->matricula = '9d3dj9dj91jd9j9';
        $this->assertFalse($veiculo->validate(['matricula']));

        $veiculo->combustivel = '9d3dj9dj91jd9j9';
        $this->assertFalse($veiculo->validate(['combustivel']));

        $veiculo->marca = '1234567890123456789012';
        $this->assertFalse($veiculo->validate(['marca']));
    }

    public function testCorrectData()
    {
        $veiculo = new Veiculo();

        //testar dados corretos

        $veiculo->marca = 'porsche';
        $veiculo->modelo = 'cayenne';
        $veiculo->combustivel = 'diesel';
        $veiculo->preco = 20 ;
        $veiculo->matricula = '23-ld-23' ;
        $veiculo->descricao = 'teste';
        $veiculo->estado = 'pronto';
        $veiculo->tipo_veiculo_id = 1;
        $veiculo->localizacao_id = 1 ;
        $veiculo->franquia=222;

        $this->assertTrue($veiculo->validate([$veiculo->marca]));
        $this->assertTrue($veiculo->validate([$veiculo->modelo]));
        $this->assertTrue($veiculo->validate([$veiculo->combustivel]));
        $this->assertTrue($veiculo->validate([$veiculo->preco]));
        $this->assertTrue($veiculo->validate([$veiculo->matricula]));
        $this->assertTrue($veiculo->validate([$veiculo->descricao]));
        $this->assertTrue($veiculo->validate([$veiculo->estado]));
        $this->assertTrue($veiculo->validate([$veiculo->tipo_veiculo_id]));
        $this->assertTrue($veiculo->validate([$veiculo->localizacao_id]));
        $this->assertTrue($veiculo->validate([$veiculo->franquia]));

    }

    public function testSavingVeiculo()
    {
        $veiculo = new Veiculo();

        //save
        $veiculo->marca = 'porsche';
        $veiculo->modelo = 'cayenne';
        $veiculo->combustivel = 'diesel';
        $veiculo->preco = 20;
        $veiculo->matricula = '23-ld-23' ;
        $veiculo->descricao = 'teste';
        $veiculo->estado = 'pronto';
        $veiculo->tipo_veiculo_id = 1;
        $veiculo->localizacao_id = 1 ;
        $veiculo-> franquia =1000;
        $veiculo->save();
        $this->tester->seeRecord('common\models\Veiculo', ['modelo' => 'cayenne']);

        //update 
        $novo = $this->tester->grabRecord('common\models\Veiculo', ['modelo' => 'cayenne']);
        $novo->modelo = 'boxster';
        $novo->save();
        $this->tester->seeRecord('common\models\Veiculo', ['modelo' => 'boxster']);
        $this->tester->dontSeeRecord('common\models\Veiculo', ['modelo' => 'cayenne']);

        //delete
        $novo->delete();
        $this->tester->dontSeeRecord('common\models\Veiculo', ['modelo' => 'boxster']);

    }
}
