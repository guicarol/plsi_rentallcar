<?php


namespace frontend\tests\Unit;

use common\models\Profile;
use frontend\tests\UnitTester;

class ProfileTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    public function testValidacao()
    {
        $profile = new Profile();

        $profile->nome = null;
        $this->assertFalse($profile->validate(['nome']));

        $profile->apelido = null;
        $this->assertFalse($profile->validate(['apelido']));

        $profile->telemovel = 'asdasd';
        $this->assertFalse($profile->validate(['telemovel']));

        $profile->nif = 'fffff';
        $this->assertFalse($profile->validate(['nif']));

        $profile->nr_carta_conducao = '9d3dj9dj91jd9j9';
        $this->assertFalse($profile->validate(['nr_carta_conducao']));


        $profile->nome = 'teste';
        $profile->apelido = 'novo';
        $profile->telemovel = 912312312;
        $profile->nif = 21312313;
        $profile->nr_carta_conducao = 231231256 ;

        $this->assertTrue($profile->validate([$profile->nome]));
        $this->assertTrue($profile->validate([$profile->apelido]));
        $this->assertTrue($profile->validate([$profile->telemovel]));
        $this->assertTrue($profile->validate([$profile->nif]));
        $this->assertTrue($profile->validate([$profile->nr_carta_conducao]));

    }

    public function testSavingUser()
    {
        $profile = new Profile();
        $profile->nome = 'teste';
        $profile->apelido = 'novo';
        $profile->telemovel = 912312312;
        $profile->nif = 21312313;
        $profile->nr_carta_conducao = '231231256' ;
        $profile->save();
        $this->tester->seeRecord('common\models\Profile', ['nome' => 'teste']);

        $user = $this->tester->grabRecord('common\models\Profile', ['nome' => 'teste', 'apelido' => 'novo']);
        $user->nome = 'unidade';
        $user->apelido='usada';
        $user->save();
        $this->tester->seeRecord('common\models\Profile', ['nome' => 'unidade', 'apelido' => 'usada']);
        $this->tester->dontSeeRecord('common\models\Profile', ['nome' => 'teste', 'apelido' => 'novo']);
        $user->delete();
        $this->tester->dontSeeRecord('common\models\Profile', ['nome' => 'unidade', 'apelido' => 'usada']);

    }
}
