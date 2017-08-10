<?php namespace App\Droit\Wordpress\Entites;

use Illuminate\Database\Eloquent\Model;

class TermRelationship extends Model
{
    protected $connection = 'wordpress_db_connection';
    protected $table = 'term_relationships';
    protected $primaryKey = ['object_id', 'term_taxonomy_id'];

    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo('App\Droit\Wordpress\Entites\Post', 'object_id');
    }

    public function taxonomy()
    {
        return $this->belongsTo('App\Droit\Wordpress\Entites\Taxonomy', 'term_taxonomy_id');
    }
}
