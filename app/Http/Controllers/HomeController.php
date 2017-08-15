<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index()
    {
        return view('frontend.index');
    }

    public function page()
    {
        $posts      = \App\Droit\Wordpress\Entites\Post::type()->status()->with(['postmetas'])->take(5)->get();
        $categories = \App\Droit\Wordpress\Entites\Taxonomy::topCategories()->get();

/*        echo '<pre>';
        print_r($categories);
        echo '</pre>';exit();*/

        return view('frontend.page')->with(['posts' => $posts, 'categories' => $categories->slice(1)->pluck('term')]);
    }
}
