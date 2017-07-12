<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateDateDecisions implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $worker;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->worker = \App::make('App\Droit\Decision\Worker\DecisionWorkerInterface');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->worker->update();
    }
}
