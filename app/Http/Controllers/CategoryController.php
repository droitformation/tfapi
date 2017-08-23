<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
        $categorie     = \App\Droit\Wordpress\Entites\Taxonomy::where('term_id','=',$id)->firstOrFail();
        $subcategories = \App\Droit\Wordpress\Entites\Taxonomy::where('taxonomy','=','category')->where('parent','=',$id)->get();

        $multiplied = $subcategories->map(function ($item, $key) {
            return [
                'top'      => $item->term->name,
                'children' => $item->allChildrenAccounts
            ];
        });

        echo '<pre>';
        print_r( $multiplied);
        echo '</pre>';exit();

        return view('frontend.category')->with(['categorie' => $categorie]);
    }
}
