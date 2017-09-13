<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
        $categorie = \App\Droit\Wordpress\Entites\Term::with(['children','parent_cat'])->find($id);
        $posts     = \App\Droit\Wordpress\Entites\Post::getPostsByCategories([$id],'20152016');

        echo '<pre>';
        print_r($posts->first());
        echo '</pre>';exit();

        return view('frontend.category')->with(['categorie' => $categorie, 'posts' => $posts]);
    }
}
