<?php

namespace App\Droit\Bger\Worker;

use App\Droit\Bger\Worker\UpdateInterface;
use App\Droit\Decision\Repo\DecisionInterface;

use App\Droit\Bger\Utility\Fetch;
use App\Droit\Bger\Utility\Dispatch;
use App\Droit\Bger\Utility\Clean;

class Update implements UpdateInterface
{
    protected $fetch;
    protected $dispatch;
    protected $clean;
    
    protected $decision;
    protected $missing;

    public function __construct(DecisionInterface $decision, Fetch $fetch, Dispatch $dispatch, Clean $clean)
    {
        $this->decision = $decision;
        $this->fetch    = $fetch;
        $this->dispatch = $dispatch;
        $this->clean    = $clean;
    }

    public function missing()
    {
        // List of dates from bger
        $dates   = $this->fetch->getList();

        // Which dates are already in the db
        $updates = $this->decision->getDates($dates->toArray());

        // Dates to fetch
        $this->missing = $dates->diff($updates->pluck('publication_list_date'));

        return $this;
    }

    public function update()
    {
        // if thera are missing dates
        if(!$this->missing->isEmpty())
        {
            // convert back dates format
            $dates = $this->missing->map(function ($item, $key) {
                return $this->clean->convertDate($item, 'Y-m-d', 'ymd');
            });

            foreach($dates as $date)
            {
                $this->create($date);
            }
        }
    }

    public function create($date)
    {
        $decisions = $this->fetch->getListDecisions($date);

        foreach($decisions as $decision)
        {
            $arret = $this->fetch->prepareArret($decision,$date);

            if($arret && !empty($arret))
            {
                $this->decision->create($arret);
            }
        }
    }
}