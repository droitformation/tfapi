<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DecisionWorkerTest extends TestCase
{
    use DatabaseTransactions;

    protected $decision;
    protected $list;
    protected $repo;

    public function setUp()
    {
        parent::setUp();

        $this->decision = \Mockery::mock('App\Droit\Bger\Utility\Decision');
        $this->list = \Mockery::mock('App\Droit\Bger\Utility\Liste');
        $this->repo = \Mockery::mock('App\Droit\Decision\Repo\DecisionInterface');

    }

    public function tearDown()
    {
        \Mockery::close();
        parent::tearDown();
    }

    public function testRunWorker()
    {
        \Queue::fake();
        \Mail::fake();

        $decisions = [
            [
                'numero'         => '5A_1016/2015',
                'categorie'      => 'Droits réels',
                'subcategorie'   => 'mesures provisionnelles (rectification du registre foncier)',
                'publication_at' => '2017-10-01',
                'decision_at'    => '2016-09-15',
            ],
            [
                'numero'         => '5A_6/2016',
                'categorie'      => 'Droit de la famille*',
                'subcategorie'   => 'divorce, communication de la décision',
                'publication_at' => '2017-10-01',
                'decision_at'    => '2016-09-14',
            ]
        ];

        // get list on list
        $this->list->shouldReceive('getList')->once()->andReturn(dates_range(3));
        // repo missing dates
        $this->repo->shouldReceive('getMissingDates')->once()->andReturn(dates_range(3));

        // missing dates empty send mail

        // list set url with date, getListDecisions
        $this->list->shouldReceive('getListDecisions')->andReturn(collect($decisions));
        $this->list->shouldReceive('setUrl')->times(3);

        $worker = new \App\Droit\Decision\Worker\DecisionWorker($this->repo,$this->decision,$this->list);
        $worker->update();

      // dispatch App\Jobs\InsertDecision x nbr of decision
        \Queue::assertPushed(\App\Jobs\InsertDecision::class, function ($job) use ($decisions) {
            return $decisions[0]['numero'] === '5A_1016/2015';
        });

        \Queue::assertPushed(\App\Jobs\InsertDecision::class, function ($job) use ($decisions) {
            return $decisions[1]['numero'] === '5A_6/2016';
        });
 /*
        // send mail notification job finish
        \Queue::assertPushed(\App\Mail\SuccessNotification::class, function ($job) {
            return $job->to === 'cindy.leschaud@gmail.com';
        });*/

        \Mail::shouldReceive('queue')->once();
    }
}
