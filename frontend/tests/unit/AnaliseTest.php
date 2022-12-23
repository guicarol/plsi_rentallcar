<?php


namespace frontend\tests\Unit;

use common\models\Analise;
use frontend\tests\UnitTester;

class AnaliseTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    public function testValidacao()
    {
        $analise = new Analise();

        $analise->comentario = null;
        $this->assertFalse($analise->validate(['comentario']));

        $analise->classificacao = 'wqesda';
        $this->assertFalse($analise->validate(['classificacao']));

        $analise->data_analise =  'teste';
        //$this->assertFalse($analise->validate(['data_analise']));

        $analise->profile_id = '21sd';
        $this->assertFalse($analise->validate(['profile_id']));

        $analise->comentario = 'TESTE';
        $analise->classificacao = 4;
        $analise->data_analise = '2022-12-16';
        $analise->profile_id = 7;



        $this->assertTrue($analise->validate([$analise->comentario]));
        $this->assertTrue($analise->validate([$analise->classificacao]));
        $this->assertTrue($analise->validate([$analise->data_analise]));
        $this->assertTrue($analise->validate([$analise->profile_id]));



    }

    public function testSavingÃnalise()
    {
        $analise = new Analise();
        $analise->comentario = 'TESTE';
        $analise->classificacao = 5;
        $analise->data_analise = '2022-12-17';
        $analise->profile_id = 7;
        $analise->save();
        $this->tester->seeRecord('common\models\Analise', ['comentario' => 'TESTE']);

        $altera = $this->tester->grabRecord('common\models\Analise', ['comentario' => 'TESTE']);
        $altera->comentario = 'miniteste';
        $altera->save();
        $this->tester->seeRecord('common\models\Analise', ['comentario' => 'miniteste']);
        $this->tester->dontSeeRecord('common\models\Analise', ['comentario' => 'TESTE']);
        $altera->delete();
        $this->tester->dontSeeRecord('common\models\Analise', ['comentario' => 'miniteste']);

    }
}
