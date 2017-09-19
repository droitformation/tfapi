<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Droit\Wordpress\Repo\TaxonomyRepo;
use App\Droit\Wordpress\Repo\PostRepo;

class SearchController extends Controller
{
    protected $taxonomy_repo;
    protected $post_repo;

    public function __construct(TaxonomyRepo $taxonomy_repo, PostRepo $post_repo)
    {
        setlocale(LC_ALL, 'fr_FR.UTF-8');

        $this->taxonomy_repo = $taxonomy_repo;
        $this->post_repo = $post_repo;
    }

    public function search(Request $request)
    {
        $posts = collect([]);

        if($request->input('terms',null)){
            $posts = $this->post_repo->search(prepareTerms($request->input('terms')));
        }

        return view('frontend.results')->with(['posts' => $posts, 'terms' => $request->input('terms','')]);
    }

    public function law(Request $request)
    {
        $posts = collect([]);

        if(!empty($request->except('_token'))){

            $law   = implode(':',array_filter($request->except('_token')));
            $posts = $this->post_repo->searchLaw($law);
        }

        $terms = collect(array_filter($request->except('_token')))->map(function ($item, $key) {
            return $key.' '.$item;
        })->toArray();

        return view('frontend.results')->with(['posts' => $posts, 'terms' => implode(', ',$terms)]);
    }
}
