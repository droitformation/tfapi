<?php namespace App\Droit\Wordpress\Entites;

use Illuminate\Database\Eloquent\Model;

class TermMeta extends Model
{
    protected $connection = 'wordpress_db_connection';
    protected $table = 'wp_termmeta';
    protected $fillable = ['meta_key', 'meta_value', 'term_id'];

    public function term()
    {
        return $this->belongsTo('App\Droit\Wordpress\Entites\Term');
    }
}
