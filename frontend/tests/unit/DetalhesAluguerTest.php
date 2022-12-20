<?php


namespace frontend\tests\Unit;

use frontend\tests\UnitTester;
use common\models\Detalhesaluguer;


class DetalhesAluguerTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    public function testValidacao()
    {
        $detalhesaluguer = new Detalhesaluguer();

        $detalhesaluguer->data_inicio = null;
        $this->assertFalse($detalhesaluguer->validate(['data_inicio']));

        $detalhesaluguer->data_fim = null;
        $this->assertFalse($detalhesaluguer->validate(['data_fim']));

        $detalhesaluguer->veiculo_id = 'sda213';
        $this->assertFalse($detalhesaluguer->validate(['veiculo_id']));

        $detalhesaluguer->profile_id = 'ffsafff';
        $this->assertFalse($detalhesaluguer->validate(['profile_id']));

        $detalhesaluguer->seguro_id = '9d3dj9dj91jd9j9';
        $this->assertFalse($detalhesaluguer->validate(['seguro_id']));

        $detalhesaluguer->localizacao_levantamento_id = '213sadasd';
        $this->assertFalse($detalhesaluguer->validate(['localizacao_levantamento_id']));

        $detalhesaluguer->localizacao_devolucao_id = 'sad12wq';
        $this->assertFalse($detalhesaluguer->validate(['localizacao_devolucao_id']));

        $detalhesaluguer->data_inicio = 2022-12-05;
        $detalhesaluguer->data_fim = 2022-12-07;
        $detalhesaluguer->veiculo_id = 1 ;
        $detalhesaluguer->profile_id = 7;
        $detalhesaluguer->seguro_id = 2;
        $detalhesaluguer->localizacao_levantamento_id = 1;
        $detalhesaluguer->localizacao_devolucao_id = 3 ;

        $this->assertTrue($detalhesaluguer->validate([$detalhesaluguer->data_inicio]));
        $this->assertTrue($detalhesaluguer->validate([$detalhesaluguer->data_fim]));
        $this->assertTrue($detalhesaluguer->validate([$detalhesaluguer->veiculo_id]));
        $this->assertTrue($detalhesaluguer->validate([$detalhesaluguer->profile_id]));
        $this->assertTrue($detalhesaluguer->validate([$detalhesaluguer->seguro_id]));
        $this->assertTrue($detalhesaluguer->validate([$detalhesaluguer->localizacao_levantamento_id]));
        $this->assertTrue($detalhesaluguer->validate([$detalhesaluguer->localizacao_devolucao_id]));

    }

    public function testSavingDetalhesaluguer()
    {
        $detalhesaluguer = new Detalhesaluguer();
        $detalhesaluguer->data_inicio = 2022-12-05;
        $detalhesaluguer->data_fim = 2022-12-07;
        $detalhesaluguer->veiculo_id = 1;
        $detalhesaluguer->profile_id = 10 ;
        $detalhesaluguer->seguro_id = 1 ;
        $detalhesaluguer->localizacao_levantamento_id = 2;
        $detalhesaluguer->localizacao_devolucao_id = 2;

        $detalhesaluguer->save();
        $this->tester->seeRecord('frontend\models\Detalhesaluguer', ['modelo' => 'cayenne']);

        $novo = $this->tester->grabRecord('frontend\models\Detalhesaluguer', ['modelo' => 'cayenne']);
        $novo->modelo = 'boxster';
        $novo->save();
        $this->tester->seeRecord('frontend\models\Detalhesaluguer', ['modelo' => 'boxster']);
        $this->tester->dontSeeRecord('frontend\models\Detalhesaluguer', ['modelo' => 'cayenne']);
        $novo->delete();
        $this->tester->dontSeeRecord('frontend\models\Detalhesaluguer', ['modelo' => 'boxster']);

    }
}
