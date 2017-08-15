<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
        $categorie = \App\Droit\Wordpress\Entites\Taxonomy::where('term_id','=',$id)->firstOrFail();

        return view('frontend.category')->with(['categorie' => $categorie]);
    }
}
