<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
        $categorie     = \App\Droit\Wordpress\Entites\Taxonomy::where('term_id','=',$id)->firstOrFail();
        $subcategories = \App\Droit\Wordpress\Entites\Taxonomy::where('taxonomy','=','category')
                            ->where('parent','=',$id)
                            ->join('wp_terms', function ($join) {
                                $join->on('wp_term_taxonomy.term_id', '=', 'wp_terms.term_id')->orderBy('name');
                            })
                            ->get();

        echo '<pre>';
        print_r($subcategories);
        echo '</pre>';
        return view('frontend.category')->with(['categorie' => $categorie, 'subcategories' => $subcategories]);
    }
}
