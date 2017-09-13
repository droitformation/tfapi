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
        echo '<pre>';
        print_r($annees->pluck('ID'));
        echo '</pre>';exit();

    }
}
