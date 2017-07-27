<?php namespace App\Droit\Bger\Entities;

/**
 * Alert object
 * List of decision found for: categorie and date of publication
 */

class AlertDecision
{
    public $categorie;
    public $publication_at;
    public $user;

    public function __construct($user,$categorie,$publication_at)
    {

    }

}