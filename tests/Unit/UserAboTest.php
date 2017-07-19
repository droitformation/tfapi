<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserAboTest extends TestCase
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

    public function testGetUsersForCadence()
    {
        $repo = \App::make('App\Droit\User\Repo\UserInterface');

        $user = factory(\App\Droit\User\Entities\User::class)->create([
            'active_until' => \Carbon\Carbon::today()->addMonth()->toDateTimeString(),
            'cadence'      => 'daily',
        ]);

        $users = $repo->getByCadence('daily');

        $this->assertEquals(1,$users->count());
    }

    public function testGetUsersForCadenceNoUsers()
    {
        $repo = \App::make('App\Droit\User\Repo\UserInterface');

        $user = factory(\App\Droit\User\Entities\User::class)->create([
            'active_until' => \Carbon\Carbon::today()->startOfDay()->addMonth()->toDateTimeString(),
            'cadence'      => 'weekly',
        ]);

        $users = $repo->getByCadence('daily');

        $this->assertEquals(0,$users->count());
    }

    public function testGetUsersForCadenceNoActiveUsers()
    {
        $repo = \App::make('App\Droit\User\Repo\UserInterface');

        $user = factory(\App\Droit\User\Entities\User::class)->create([
            'active_until' => \Carbon\Carbon::today()->startOfDay()->subMonth()->toDateTimeString(),
            'cadence'      => 'daily',
        ]);

        $users = $repo->getByCadence('daily');
        $all = $repo->getAll();

        $this->assertEquals(0,$users->count());
        $this->assertEquals(1,$all->count());
    }

    public function testGetAbosOfUser()
    {
        $user = factory(\App\Droit\User\Entities\User::class)->create([
            'active_until' => \Carbon\Carbon::today()->startOfDay()->addMonth()->toDateTimeString(),
            'cadence'      => 'daily',
        ]);

        $abo1 = factory(\App\Droit\Abo\Entities\Abo::class)->create([
            'user_id'  => $user->id,
            'keywords' => '"Assurance de Protection Juridique SA"',
        ]);

        $abo2 = factory(\App\Droit\Abo\Entities\Abo::class)->create([
            'user_id'  => $user->id,
            'keywords' => '"recours en matière civile","canton de Genève"',
        ]);

        $expect = collect([
            $abo1->categorie_id => ['keywords' => collect(['Assurance de Protection Juridique SA']), 'published' => null],
            $abo2->categorie_id => ['keywords' => collect(['recours en matière civile','canton de Genève']), 'published' => null],
        ]);

        $this->assertEquals($expect,$user->abonnements);
    }
}
