<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
        $categorie  = \Corcel\Model\Taxonomy::category()->slug($id)->get();
        $categories = \App\Droit\Wordpress\Entites\Term::with(['children','parent_cat'])->find($id);
        $posts      = \Corcel\Model\Post::taxonomy('category',$id)->get();

        return view('frontend.category')->with(['categorie' => $categorie->first(), 'categories' => $categories, 'posts' => $posts]);
    }
}
