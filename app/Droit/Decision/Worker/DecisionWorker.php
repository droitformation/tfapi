<?php namespace App\Droit\Decision\Worker;

use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Droit\Decision\Worker\DecisionWorkerInterface;
use App\Droit\Decision\Repo\DecisionInterface;
use App\Droit\Bger\Utility\Decision;
use App\Droit\Bger\Utility\Liste;

class DecisionWorker implements DecisionWorkerInterface
{
    use DispatchesJobs;

    protected $repo;
    protected $decision;
    protected $liste;

    public function __construct(DecisionInterface $repo, Decision $decision, Liste $liste)
    {
        $this->repo = $repo;
        $this->decision = $decision;
        $this->liste = $liste;
    }

    public function update()
    {
        $list_dates    = $this->liste->getList(true);
        $missing_dates = $this->repo->getMissingDates($list_dates->toArray());

        // Only for testing =============================================
        // $missing_dates = array_slice($missing_dates, 0, 2);
        // ==============================================================

        // If we have already have all dates
        if(empty($missing_dates)){
            \Mail::to('cindy.leschaud@gmail.com')->queue(new \App\Mail\SuccessNotification('Aucune date à mettre à jour'));
            return true;
        }

        // Loop over missing dates
        foreach ($missing_dates as $date) {

            $this->liste->setUrl($date); // Set the url with the date

            $decisions = $this->liste->getListDecisions(); // Get list of decisions for date

            if(!$decisions->isEmpty()){
                $decisions->map(function ($decision) {
                    dispatch(new \App\Jobs\InsertDecision($decision));
                });

                \Mail::to('cindy.leschaud@gmail.com')->queue(new \App\Mail\SuccessNotification('Mise à jour des décisions terminées'));
            }
        }

    }
}