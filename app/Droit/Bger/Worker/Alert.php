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
        $abos    = $this->user->getByCadence($this->cadence);
        $already = $this->alreadySent();

        return $abos->reject(function ($item, $key) use ($already){
                return $already->contains('user_id', $item->id);
            })->map(function($user){

            $results = $user->abonnements->map(function($list,$categorie_id){
                // list keys:  keywords => collection, published => bool
                $keywords  = $list['keywords'];
                $published = $list['published'];

                return $keywords->map(function($keyword) use ($categorie_id,$published){
                    return $this->findDecision($keyword,$categorie_id,$published);
                })->reject(function($item){
                    return $item['decisions']->isEmpty();
                });

            })->reject(function($item){
                return $item->isEmpty();
            });

            return ['user' => $user, 'abos' => $results->flatten(1)];

        })->reject(function($item){
            return $item['abos']->isEmpty();
        });
    }

    public function findDecision($keyword,$categorie_id,$published)
    {
        $keyword = isset($keyword) && !$keyword->isEmpty() ? $keyword : null;

        $found = $this->decision->search(['terms' => array_filter($keyword->toArray()), 'categorie' => $categorie_id, 'published' => $published, 'publication_at' => $this->publication_at]);

        return ['decisions' => $found, 'categorie' => $categorie_id, 'keywords' => $keyword];
    }

    public function sent($abo){

        $date = !is_array($this->publication_at) ? $this->publication_at : array_pop($this->publication_at);

        return \App\Droit\Bger\Entities\Alert_sent::create(['user_id' => $abo->id, 'publication_at' => $date]);
    }

    public function alreadySent(){

        $date = !is_array($this->publication_at) ? $this->publication_at : array_pop($this->publication_at);

        return \App\Droit\Bger\Entities\Alert_sent::whereDate('publication_at', $date)->get();
    }
}