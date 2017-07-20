<?php

namespace App\Droit\Bger\Worker;

use App\Droit\Bger\Worker\AlertInterface;

use App\Droit\Decision\Repo\DecisionInterface;
use App\Droit\User\Repo\UserInterface;

class Alert implements AlertInterface
{
    protected $decision;
    protected $user;
    protected $cadence;

    public $publication_at;

    public function __construct(DecisionInterface $decision, UserInterface $user)
    {
        $this->decision = $decision;
        $this->user     = $user;
    }

    /**
     * @param mixed $cadence
     */
    public function setCadence($cadence)
    {
        $this->cadence = $cadence;

        return $this;
    }

    /**
     * @param mixed $publication_at
     */
    public function setDate($publication_at)
    {
        $this->publication_at = $publication_at;

        return $this;
    }

    // get all user
    // daily abo and weekly if it is friday
    // loop each keywords list
    // Search in new decisisions of the day or week

    public function getUsers()
    {
        $abos = $this->user->getByCadence($this->cadence);

        return $abos->map(function($user){
            return $user->abonnements->map(function($list,$categorie_id){
                // list keys:  keywords => collection, published => bool
                $keywords  = $list['keywords'];
                $published = $list['published'];

                return $results = $keywords->map(function($keyword) use ($categorie_id,$published){
                    $keyword = !$keyword->isEmpty() ? $keyword : null;

                    $found = $this->decision->search(['terms' => $keyword, 'categorie' => $categorie_id, 'published' => $published, 'publication_at' => $this->publication_at]);
                    $found = !$found->isEmpty() ? $found : null;

                    if($found){
                        return ['decisisons' => $found, 'categorie' => $categorie_id, 'keywords' => $keyword];
                    }

                    return false;
                });
            });
        })->flatten(2)->reject(function($item){
            return empty($item);
        });
    }
}