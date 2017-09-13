<?php namespace App\Droit\Wordpress\Entites;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $connection = 'wordpress_db_connection';
    protected $table = 'wp_terms';
    protected $primaryKey = 'term_id';

    public $timestamps = false;

    public function taxonomy()
    {
        return $this->hasOne('App\Droit\Wordpress\Entites\Taxonomy', 'term_id');
    }

    public function parent_cat()
    {
        return $this->hasManyThrough(
            'App\Droit\Wordpress\Entites\Term',
            'App\Droit\Wordpress\Entites\Taxonomy',
            'term_id', // Foreign key on users table...
            'term_id', // Foreign key on posts table...
            'term_id', // Local key on countries table...
            'parent' // Local key on users table...
        )->select('parent','name');
    }

    public function children()
    {
        return $this->hasMany('App\Droit\Wordpress\Entites\Taxonomy', 'parent', 'term_id')
            ->join('wp_terms', 'wp_term_taxonomy.term_id', '=', 'wp_terms.term_id')
            ->groupBy('wp_terms.term_id')
            ->orderBy('wp_terms.name','ASC');
    }
}
