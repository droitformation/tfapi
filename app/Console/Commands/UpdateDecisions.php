<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateDecisions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:decision';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update decisisons list from TF CH';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        dispatch(new \App\Jobs\UpdateDateDecisions());
        \Mail::to('cindy.leschaud@gmail.com')->queue(new \App\Mail\SuccessNotification('Mise à jour des décisions commencé'));
    }
}
