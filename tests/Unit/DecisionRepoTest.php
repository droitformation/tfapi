<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DecisionRepoTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        \Mockery::close();
        parent::tearDown();
    }

    public function testModelAlredyExistInDb()
    {
        $date = \Carbon\Carbon::today();

        $decision = factory(\App\Droit\Decision\Entities\Decision::class)->create(['numero' => '4A_123/2017','publication_at' => $date]);

        $repo = \App::make('App\Droit\Decision\Repo\DecisionInterface');

        $results = $repo->findByNumeroAndDate('4A_123/2017',$date);

        $this->assertSame($results->numero,$decision->numero);
    }

    public function testSearchParams()
    {
        $date = \Carbon\Carbon::today()->toDateTimeString();

        $decision = factory(\App\Droit\Decision\Entities\Decision::class)->create([
            'publication_at' => $date,
            'texte' =>
                '<div>Dapibus ante accumasa laoreelentesque lorém arcû in quisqué éuismod metus enim imperdiet egéstat ligula àc voluptà torquent sapien 
                placérat liçlà à, nullä ultrices Assurance de Protection Juridique SA égét 44 395€ dapidûs quisque à nullä dui congue ïpsum séd léo séd hac.
                Conges quém mattis sènèctus malet, consequat liçlà</div>.

                <div>Morbi phasellus c\'est torquenté malésdum aptenté l\'2 068€ duis sem fancibüs classé d\'adipiscing duis, rutrum malésdum elementum mi est 
                velit faucibus élémentum interûllam çurcus molestié imperdiet vestibulum suspendisse tempor habitant sit pélléntésque sit 
                çunc, primiés?</div>',
        ]);

        $repo = \App::make('App\Droit\Decision\Repo\DecisionInterface');

        // Pass only array of terms
        $params['terms'] = ['Assurance de Protection Juridique SA'];

        $results = $repo->search($params);

        $this->assertTrue($results->contains('id',$decision->id));

        // With date
        $params['publication_at'] = $date;

        $results = $repo->search($params);

        $this->assertTrue($results->contains('id',$decision->id));

        // With all the above and categorie
        $params['categorie_id'] = $decision->categorie_id;

        $results = $repo->search($params);

        $this->assertTrue($results->contains('id',$decision->id));

        // With all the above and published but isn't
        $params['published'] = 1;

        $results = $repo->search($params);

        $this->assertFalse($results->contains('id',$decision->id));
    }

    public function testSearchString()
    {
        $date = \Carbon\Carbon::today()->toDateTimeString();

        $decision = factory(\App\Droit\Decision\Entities\Decision::class)->create([
            'publication_at' => $date,
            'texte' =>
                '<div>Dapibus ante accumasa laoreelentesque lorém arcû in quisqué éuismod metus enim imperdiet egéstat ligula àc voluptà torquent sapien 
                placérat liçlà à, nullä ultrices Assurance de Protection Juridique SA égét 44 395€ dapidûs quisque à nullä dui congue ïpsum séd léo séd hac.
                Conges quém mattis sènèctus malet, consequat liçlà</div>.

                <div>Morbi phasellus c\'est torquenté malésdum aptenté l\'2 068€ duis sem fancibüs classé d\'adipiscing duis, rutrum malésdum elementum mi est 
                velit faucibus élémentum interûllam çurcus molestié imperdiet vestibulum suspendisse tempor habitant sit pélléntésque sit 
                çunc, primiés?</div>',
        ]);

        $decision2 = factory(\App\Droit\Decision\Entities\Decision::class)->create([
            'publication_at' => $date,
            'texte' =>
                '<div>Dapibus à nul Assurance de Protection Juridique SA égét 44 3€ dapidûs quisque à nullä dui cctus malet, consequat liçlà</div>.'
        ]);

        $repo = \App::make('App\Droit\Decision\Repo\DecisionInterface');

        // Pass only array of terms
        $params['terms'] = ['Assurance de Protection Juridique SA','élémentum interûllam çurcus molestié','vestibulum'];

        $results = $repo->search($params);

        // We found only the first one, it contains all keywords
        $this->assertTrue($results->contains('id',$decision->id));
        $this->assertEquals(1,$results->count());
    }
}
