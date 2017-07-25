<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmailAlert implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $publication_at;
    protected $cadence;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($publication_at, $cadence)
    {
        $this->publication_at = $publication_at;
        $this->cadence = $cadence;

        setlocale(LC_ALL, 'fr_FR.UTF-8');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $alert = \App::make('App\Droit\Bger\Worker\AlertInterface');
        $alert->setCadence($this->cadence)->setDate($this->publication_at);

        $date = \Carbon\Carbon::parse($this->publication_at)->formatLocalized('%d %B %Y');

        $users = $alert->getUsers();

        if (!$users->isEmpty()){
            foreach ($users as $user) {
                \Mail::to($user['user']->email)->queue(new \App\Mail\AlerteDecision($user['user'], $date, $user['abos']));
                $alert->sent($user['user']);
            }

            \Mail::to('cindy.leschaud@gmail.com')->queue(new \App\Mail\SuccessNotification('Envoi des alertes commencé'));
        }
        else{
            \Mail::to('cindy.leschaud@gmail.com')->queue(new \App\Mail\SuccessNotification('Aucune alertes'));
        }
    }
}
