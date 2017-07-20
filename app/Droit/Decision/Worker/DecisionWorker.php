<?php namespace App\Droit\Decision\Worker;

use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Droit\Decision\Worker\DecisionWorkerInterface;
use App\Droit\Decision\Repo\DecisionInterface;
use App\Droit\Categorie\Worker\CategorieWorkerInterface;

use App\Droit\Bger\Utility\Decision;
use App\Droit\Bger\Utility\Liste;
use Illuminate\Support\Collection;

class DecisionWorker implements DecisionWorkerInterface
{
    use DispatchesJobs;

    protected $repo;
    protected $decision;
    protected $worker;
    protected $liste;

    public $missing_dates;

    public function __construct(DecisionInterface $repo, CategorieWorkerInterface $worker, Decision $decision, Liste $liste)
    {
        $this->repo = $repo;
        $this->decision = $decision;
        $this->worker = $worker;
        $this->liste = $liste;
    }

    public function setMissingDates(Collection $dates = null)
    {
        if(!$dates){
            $dates = $this->liste->getList(true);
        }

        $this->missing_dates = $this->repo->getMissingDates($dates->toArray());

        return $this;
    }

    public function update()
    {
        // If we have already have all dates
        if(empty($this->missing_dates)){
            \Mail::to('cindy.leschaud@gmail.com')->send(new \App\Mail\SuccessNotification('Aucune date à mettre à jour'));
            return true;
        }

        // Loop over missing dates
        foreach($this->missing_dates as $date) {

            $decisions = $this->liste->setUrl($date)->getListDecisions(); // Get list of decisions for date

            if(!$decisions->isEmpty()){
                $decisions->map(function ($decision) {
                    dispatch(new \App\Jobs\InsertDecision($decision));
                });

                // Attach eventuals categorie for special keywords
                $this->worker->process($date);

                \Mail::to('cindy.leschaud@gmail.com')->queue(new \App\Mail\SuccessNotification('Mise à jour des décisions terminées '.$date));
            }
        }
    }
}