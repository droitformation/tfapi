<?php namespace App\Droit\Wordpress\Entites;

use Illuminate\Database\Eloquent\Model;

class Postmeta extends Model {

    protected $connection = 'wordpress_db_connection';
    protected $table = 'wp_postmeta';
    protected $primaryKey = 'meta_id';

    /**
     * Get the postmeta for the blog post.
     */
    public function post() {
        return $this->belongsTo('App\Droit\Wordpress\Entites\Post');
    }

}