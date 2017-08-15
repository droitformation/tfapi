<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
        $categorie = \App\Droit\Wordpress\Entites\Taxonomy::topCategories()->find($id);

        return view('frontend.category')->with(['posts' => $posts, 'categories' => $categories->slice(1)->pluck('term')]);
    }
}
