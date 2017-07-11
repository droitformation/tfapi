<?php

namespace App\Droit\Article\Entities;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use Searchable;

    protected $table = 'articles_test';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'publication_at', 'decision_at', 'categorie', 'remarque', 'link', 'numero', 'texte', 'langue', 'publish', 'updated'
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'articles_index';
    }

}
