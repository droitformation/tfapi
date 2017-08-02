<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:alert {cadence}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send alert for decisions';

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
        $today = \Carbon\Carbon::today();

        if($today->dayOfWeek == 5){

            $monday = $today->startOfWeek();
            $friday = $today->startOfWeek()->parse('this friday');

            dispatch(new \App\Jobs\SendEmailAlert(generateDateRange($monday, $friday), $this->argument('cadence')));
        }

        dispatch(new \App\Jobs\SendEmailAlert($today->startOfDay()->toDateTimeString(), $this->argument('cadence')));
    }
}
