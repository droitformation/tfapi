<?php

namespace App\Droit\Decision\Entities;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Decision extends Model
{
    protected $table = 'decisions';

    protected $dates = ['publication_at','decision_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'publication_at', 'decision_at', 'categorie_id', 'remarque', 'link', 'numero', 'texte', 'langue', 'publish', 'updated'
    ];

    public function scopeSearch($query,$terms)
    {
        if($terms && !empty($terms))
        {
            foreach($terms as $term)
            {
                $query->whereRaw('texte  REGEXP "[[:<:]]'.$term.'[[:>:]]"');
            }
        };
    }

    public function scopeCategorie($query,$categories)
    {
        if ($categories) $query->whereHas('categorie', function ($query) use ($categories)
        {
            $query->where('categorie_id', '=' ,$categories);
        });
    }

    public function scopePublication($query, $publish)
    {
        if($publish) $query->where('publish', '=' ,1);
    }

    public function getPublicationListDateAttribute()
    {
        return $this->publication_at->toDateString();
    }

    public function categorie()
    {
        return $this->hasMany('App\Droit\Categorie\Entities\Categorie');
    }
}
