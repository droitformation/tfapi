<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendDailyAlert implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $publication_at;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($publication_at)
    {
        $this->publication_at = $publication_at;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $alert = \App::make('App\Droit\Bger\Worker\AlertInterface');
        $alert->setCadence('daily')->setDate($this->publication_at);

        $users = $alert->getUsers();

        if (!$users->isEmpty()){
            foreach ($users as $user) {
                \Mail::to($user['user']->email)->queue(new \App\Mail\AlerteDecision($user['user'], $this->publication_at, $user['abos']));
                $alert->sent($user['user']);
            }
        }

    }
}
