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
        $this->middleware('auth');
    }

    public function index()
    {
        return view('frontend.index');
    }

    public function page()
    {
        $posts      = \App\Droit\Wordpress\Entites\Post::type()->status()->with(['postmetas'])->take(5)->get();
        $categories = \App\Droit\Wordpress\Entites\Taxonomy::categories()->take(5)->get();

        return view('frontend.page')->with(['posts' => $posts, 'categories' => $categories->pluck('term')]);
    }
}
