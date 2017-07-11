<?php

namespace App\Droit\Article\Entities;

use Illuminate\Database\Eloquent\Model;

class Article_test extends Model
{
    public $timestamps = false;
    protected $table = 'articles_test';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'publication_at', 'decision_at', 'categorie', 'remarque', 'link', 'numero', 'texte', 'langue', 'publish', 'updated'
    ];

}
