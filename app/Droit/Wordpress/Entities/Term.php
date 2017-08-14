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
}
