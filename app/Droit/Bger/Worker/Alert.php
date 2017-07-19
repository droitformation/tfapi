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
    }

    // get all user
    // daily abo and weekly if it is friday
    // loop each keywords list
    // Search in new decisisions of the day or week
    public function getUsers()
    {

    }
}