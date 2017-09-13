<?php namespace App\Droit\Wordpress\Entites;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $connection = 'wordpress_db_connection';
    protected $table = 'wp_posts';
    protected $primaryKey = 'ID';

    public function getContentAttribute()
    {
        return wpautop($this->post_content);
    }

    public function getEditionAttribute()
    {
        //return !$this->annee->isEmpty() ? $this->annee->first() : null;
    }

    public function getTitleLinkAttribute()
    {
        $atf = array_get($this->metas, 'atf', null);

        return $atf ? $atf : $this->post_title;
    }

    public function getMetasAttribute()
    {
        return $this->postmetas->mapWithKeys(function ($item, $key) {
            return [$item['meta_key'] => $item['meta_value']];
        })->toArray();
    }

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

    public function annee()
    {
    /*    return $this->belongsToMany(
            'App\Droit\Wordpress\Entites\Taxonomy', 'wp_term_relationships', 'object_id', 'term_taxonomy_id'
        )->where('taxonomy', '=' ,'annee')
            ->join('wp_terms', 'wp_term_taxonomy.term_id', '=', 'wp_terms.term_id')
            ->select('wp_term_taxonomy.taxonomy','wp_terms.slug','wp_terms.name','wp_terms.term_id');*/

        return $this->hasManyThrough(
            'App\Droit\Wordpress\Entites\Term',
            'App\Droit\Wordpress\Entites\Taxonomy',
            'term_taxonomy_id', // Foreign key on users table...
            'term_id', // Foreign key on posts table...
            'term_id', // Local key on countries table...
            'object_id' // Local key on users table...
        )->where('taxonomy', '=' ,'annee')
            ->select('wp_term_taxonomy.taxonomy','wp_terms.slug','wp_terms.name','wp_terms.term_id');
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

    /**
     * Filter by post annee
     */
    public function scopeAnnee($query, $annee = null) {
        if($annee){
            return $query->where(function ($qu) use ($annee) {
                $qu->join('wp_term_relationships', 'wp_posts.ID', '=', 'wp_term_relationships.object_id')
                    ->join('wp_term_taxonomy', 'wp_term_relationships.term_taxonomy_id','=', 'wp_term_taxonomy.term_taxonomy_id')
                    ->join('wp_terms', 'wp_term_taxonomy.term_id', '=', 'wp_terms.term_id')
                    ->where('wp_term_taxonomy.taxonomy', '=' ,'annee')->where('wp_terms.slug', '=', $annee);
            });
        }
    }

    /**
     * Filter by post categories
     */
    public function scopeCategories($query, $categories = []) {
        if(!empty($categories)){
            return $query->where(function ($qu) use ($categories) {
                $qu->join('wp_term_relationships', 'wp_posts.ID', '=', 'wp_term_relationships.object_id')
                    ->join('wp_term_taxonomy', 'wp_term_relationships.term_taxonomy_id','=', 'wp_term_taxonomy.term_taxonomy_id')
                    ->join('wp_terms', 'wp_term_taxonomy.term_id', '=', 'wp_terms.term_id')
                    ->where('wp_term_taxonomy.taxonomy', '=' ,'category')->whereIn('wp_term_taxonomy.term_id', $categories);
            });
        }
    }

    //Method to get post with postmeta
    public function getPosts() {
        return Post::with('postmetas')
            ->status()
            ->type()
            ->get();
    }

    //Method to get post by array of categories
    static function getPostsByCategories(array $categories, $annee = null) {

        return Post::status()->type()
                ->with(['annee','postmetas' => function ($query) {
                    $query->where('meta_key', '=', 'atf')->orWhere('meta_key', '=', 'auteur');
                }])
                ->join('wp_term_relationships', 'wp_posts.ID', '=', 'wp_term_relationships.object_id')
                ->join('wp_term_taxonomy', 'wp_term_relationships.term_taxonomy_id','=', 'wp_term_taxonomy.term_taxonomy_id')
                ->join('wp_terms', 'wp_term_taxonomy.term_id', '=', 'wp_terms.term_id')
               // ->categories($categories)
                ->where('wp_term_taxonomy.taxonomy', '=' ,'category')
                ->whereIn('wp_term_taxonomy.term_id', $categories)
                //->annee($annee)
                /*->whereHas('categories', function ($query) use ($categories) {
                    $query->whereIn('term_id', $categories);
                })*/
                ->orderBy('post_date', 'DESC')
                //->toSql();
                ->paginate(5);
    }

}