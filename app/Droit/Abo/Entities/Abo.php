<?php

namespace App\Droit\Abo\Entities;

use Illuminate\Database\Eloquent\Model;

class Abo extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'user_id','categorie_id', 'keywords'
    ];
}
