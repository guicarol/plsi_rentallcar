<?php


namespace frontend\tests\Unit;

use common\models\Localizacao;
use frontend\tests\UnitTester;

class LocalizacaoTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    public function testValidacao()
    {
        $localizacao = new Localizacao();

        //testar com dados null

        $localizacao->localizacao = null;
        $this->assertFalse($localizacao->validate(['localizacao']));

        $localizacao->morada = null;
        $this->assertFalse($localizacao->validate(['morada']));

        $localizacao->cod_postal = null;
        $this->assertFalse($localizacao->validate(['cod_postal']));

        //testar com dados de tipo errados

        $localizacao->localizacao = 11;
        $this->assertFalse($localizacao->validate(['localizacao']));

        $localizacao->morada = 22;
        $this->assertFalse($localizacao->validate(['morada']));

        $localizacao->cod_postal = 33;
        $this->assertFalse($localizacao->validate(['cod_postal']));

        //testar com dados demasiado longos

        $localizacao->localizacao = '1234567890123456789012345678901234567890123456789012';
        $this->assertFalse($localizacao->validate(['localizacao']));

        $localizacao->morada = '123456789012345678901234567890123456789012345678901234567890123456789012';
        $this->assertFalse($localizacao->validate(['morada']));

        $localizacao->cod_postal = '1234567890';
        $this->assertFalse($localizacao->validate(['cod_postal']));

        //testar com dados corretos

        $localizacao->localizacao = 'TESTE';
        $localizacao->morada = 'Rua de testesssss';
        $localizacao->cod_postal = '2460-122';


        $this->assertTrue($localizacao->validate([$localizacao->localizacao]));
        $this->assertTrue($localizacao->validate([$localizacao->morada]));
        $this->assertTrue($localizacao->validate([$localizacao->cod_postal]));
    }

    public function testSavingLocalizacao()
    {
        $localizacao = new Localizacao();
        $localizacao->localizacao = 'TESTE';
        $localizacao->morada = 'Rua de testesssss';
        $localizacao->cod_postal = '2460-122';
        $localizacao->save();
        $this->tester->seeRecord('common\models\Localizacao', ['localizacao' => 'TESTE']);

        $altera = $this->tester->grabRecord('common\models\Localizacao', ['localizacao' => 'TESTE']);
        $altera->localizacao = 'miniteste';
        $altera->save();
        $this->tester->seeRecord('common\models\Localizacao', ['localizacao' => 'miniteste']);
        $this->tester->dontSeeRecord('common\models\Localizacao', ['localizacao' => 'TESTE']);
        $altera->delete();
        $this->tester->dontSeeRecord('common\models\Localizacao', ['localizacao' => 'miniteste']);

    }
}
