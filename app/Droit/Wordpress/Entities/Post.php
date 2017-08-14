<?php namespace App\Droit\Wordpress\Entites;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $connection = 'wordpress_db_connection';
    protected $table = 'wp_posts';
    protected $primaryKey = 'ID';

    /**
     * Get the postmeta for the blog post.
     */
    public function postmetas() {
        return $this->hasMany('App\Droit\Wordpress\Entites\Postmeta', 'post_id')->whereIn('meta_key',['atf','termes_rechercher']);
    }

    public function taxonomies()
    {
        return $this->belongsToMany(
            'App\Droit\Wordpress\Entites\Taxonomy', 'wp_term_relationships', 'object_id', 'term_taxonomy_id'
        );
    }

    public function categories()
    {
        return $this->belongsToMany(
            'App\Droit\Wordpress\Entites\Taxonomy', 'wp_term_relationships', 'object_id', 'term_taxonomy_id'
        )->where('taxonomy', '=','category');
    }
    /**
     * Filter by post type
     */
    public function scopeType($query, $type = 'post') {
        return $query->where('post_type', '=', $type);
    }

    /**
     * Filter by post status
     */
    public function scopeStatus($query, $status = 'publish') {
        return $query->where('post_status', '=', $status);
    }

    /**
     * Filter by post author
     */
    public function scopeAuthor($query, $author = null) {
        if (!empty($author)) {
            return $query->where('post_author', '=', $author);
        }
    }

    //Method to get post with postmeta
    public function getPosts() {
        return Post::with('postmetas')
            ->status()
            ->type()
            ->get();
    }

}