<?php namespace App\Droit\Wordpress\Entites;

use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model
{
    protected $connection = 'wordpress_db_connection';
    protected $table = 'wp_term_taxonomy';
    protected $primaryKey = 'term_taxonomy_id';
    protected $with = ['term'];
    public $timestamps = false;

    public function meta()
    {
        return $this->hasMany('App\Droit\Wordpress\Entites\TermMeta', 'term_id');
    }

    public function term()
    {
        return $this->belongsTo('App\Droit\Wordpress\Entites\Term', 'term_id');
    }

    public function scopeCategories($query) {
        return $query->where('taxonomy','=','category');
    }

    public function scopeTopCategories($query) {
        return $query->where('taxonomy','=','category')->where('parent','=',0);
    }

    public function parent()
    {
        return $this->belongsTo('App\Droit\Wordpress\Entites\Taxonomy', 'parent');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Droit\Wordpress\Entites\Post', 'wp_term_relationships', 'term_taxonomy_id', 'object_id');
    }

    /**
     * Magic method to return the meta data like the post original fields.
     *
     * @param string $key
     * @return string
     */
    public function __get($key)
    {
        if (!isset($this->$key)) {
            if (isset($this->term->$key)) {
                return $this->term->$key;
            }
        }

        return parent::__get($key);
    }
}
