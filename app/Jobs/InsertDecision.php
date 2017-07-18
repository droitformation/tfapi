<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class InsertDecision implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $decision;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $decision)
    {
        $this->decision = $decision;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $repo   = \App::make('App\Droit\Decision\Repo\DecisionInterface');
        $failed = \App::make('App\Droit\Decision\Repo\FailedInterface');

        $worker = new \App\Droit\Bger\Utility\Decision();

        $data = $worker->setDecision($this->decision)->getArret();

        if($data){
            $repo->create($data);
        }
        else{
            $failed->create(['publication_at' => $data['publication_at'], 'numero' => $data['numero']]);
        }
    }
}
