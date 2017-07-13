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
}
