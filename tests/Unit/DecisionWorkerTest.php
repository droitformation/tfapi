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
        $this->list->shouldReceive('setUrl')->times(3)->andReturn($this->list);
        $this->list->shouldReceive('getListDecisions')->andReturn(collect($decisions));

        $worker = new \App\Droit\Decision\Worker\DecisionWorker($this->repo,$this->decision,$this->list);
        $worker->setMissingDates()->update();

      // dispatch App\Jobs\InsertDecision x nbr of decision
        \Queue::assertPushed(\App\Jobs\InsertDecision::class, function ($job) use ($decisions) {
            return $decisions[0]['numero'] === '5A_1016/2015';
        });

        \Queue::assertPushed(\App\Jobs\InsertDecision::class, function ($job) use ($decisions) {
            return $decisions[1]['numero'] === '5A_6/2016';
        });
    }

    public function testRunWorkerNoMissingDate()
    {
        \Mail::fake();

        // get list on list
        $this->list->shouldReceive('getList')->once()->andReturn(dates_range(3));
        // repo missing dates
        $this->repo->shouldReceive('getMissingDates')->once()->andReturn([]);

        $worker = new \App\Droit\Decision\Worker\DecisionWorker($this->repo,$this->decision,$this->list);
        $worker->setMissingDates()->update();

        // missing dates empty send mail
        \Mail::assertSent(\App\Mail\SuccessNotification::class, function ($mail){
            return $mail->hasTo('cindy.leschaud@gmail.com');
        });
    }

    public function testRunWorkerSetMissingDate()
    {
        $collection_dates = dates_range(3);

        // no need to call getList we passing manually somme dates
        // repo missing dates
        $this->repo->shouldReceive('getMissingDates')->once()->andReturn($collection_dates);

        // Create a decision worker instance with mocked dependencies
        $worker = new \App\Droit\Decision\Worker\DecisionWorker($this->repo,$this->decision,$this->list);
        $worker->setMissingDates($collection_dates);

        // missing dates should be the same as passed
        $this->assertEquals($worker->missing_dates,$collection_dates);
    }
}
