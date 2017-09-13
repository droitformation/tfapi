<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($id)
    {
        //$post = \App\Droit\Wordpress\Entites\Post::getPostsByCategories([27]);
        $post = \Corcel\Model\Post::find($id);

        $annees =  \Corcel\Model\Post::taxonomy('category','Arbitrage')->taxonomy('annee','20152016')->get();

        $categories = \Corcel\Model\Taxonomy::where('taxonomy', 'category')->where('parent','=',0)->get();

        echo '<pre>';
        print_r($categories->pluck('term'));
        echo '</pre>';exit();

    }
}
