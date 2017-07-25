<?php namespace App\Droit\Decision\Worker;

use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Droit\Decision\Worker\DecisionWorkerInterface;
use App\Droit\Decision\Repo\DecisionInterface;
use App\Droit\Decision\Repo\FailedInterface;
use App\Droit\Categorie\Worker\CategorieWorkerInterface;

use App\Droit\Bger\Utility\Decision;
use App\Droit\Bger\Utility\Liste;
use Illuminate\Support\Collection;

class DecisionWorker implements DecisionWorkerInterface
{
    use DispatchesJobs;

    protected $repo;
    protected $decision;
    protected $categorie;
    protected $liste;
    protected $failed;

    // Collection
    public $missing_dates;

    public function __construct(DecisionInterface $repo, FailedInterface $failed, CategorieWorkerInterface $categorie, Decision $decision, Liste $liste)
    {
        $this->repo      = $repo;
        $this->failed    = $failed;
        $this->decision  = $decision;
        $this->categorie = $categorie;
        $this->liste     = $liste;
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
        if($this->missing_dates->isEmpty()){
            \Mail::to('cindy.leschaud@gmail.com')->send(new \App\Mail\SuccessNotification('Aucune date à mettre à jour'));
            return true;
        }

        // Loop over missing dates
        foreach($this->missing_dates as $date) {

            $decisions = $this->liste->setUrl($date)->getListDecisions(); // Get list of decisions for date

            if(!$decisions->isEmpty()){

                $decisions->map(function ($decision) {
                    $this->insert($decision);
                });

                // Attach eventuals categorie for special keywords
                $this->categorie->process($date);

                \Mail::to('cindy.leschaud@gmail.com')->queue(new \App\Mail\SuccessNotification('Mise à jour des décisions terminées '.$date));
            }
        }
    }

    public function insert($data)
    {
        $result = $this->decision->setDecision($data)->getArret();

        return $result ? $this->repo->create($result) : $this->failed->create($data);
    }

}