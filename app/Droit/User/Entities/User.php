<?php

namespace App\Droit\User\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function abos()
    {
        return $this->hasMany('App\Droit\Abo\Entities\Abo');
    }

    public function abo_publish()
    {
        return $this->hasMany('App\Droit\Abo\Entities\Abo_publish');
    }
}
