<?php namespace App\Droit\Decision\Worker;

use App\Droit\Decision\Worker\DecisionWorkerInterface;
use App\Droit\Decision\Repo\DecisionInterface;
use \App\Droit\Bger\Utility\Decision;
use \App\Droit\Bger\Utility\Liste;

class DecisionWorker implements DecisionWorkerInterface
{
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

        $missing_dates = array_slice($missing_dates, 0, 2);

        if(!empty($missing_dates)){

            foreach ($missing_dates as $date) {

                $date = \Carbon\Carbon::parse($date)->format('Ymd');

                $this->liste->setUrl($date);

                $decisions = $this->liste->getListDecisions();

                if(!$decisions->isEmpty()){
                    foreach($decisions as $decision){

                        $new = $this->decision->setDecision($decision)->getArret();
                        $this->repo->create($new);
                    }
                }
            }
        }

    }
}