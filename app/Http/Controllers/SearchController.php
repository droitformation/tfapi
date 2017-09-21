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
        $laws = collect([]);

        if(!empty($request->input('laws',[]))){
            $laws = collect($request->input('laws'))->transpose()->map(function ($item, $key) {
                return [
                    'article' => isset($item[0]) ? $item[0] : null,
                    'loi'     => isset($item[1]) ? $item[1] : null,
                    'alinea'  => isset($item[2]) ? $item[2] : null,
                    'chiffre' => isset($item[3]) ? $item[3] : null,
                    'lettre'  => isset($item[4]) ? $item[4] : null,
                ];
            })->map(function ($item, $key) {
                return  implode(':',array_filter($item));
            });

            $posts = $this->post_repo->searchLaw($laws);
        }

        return view('frontend.results')->with(['posts' => $posts, 'terms' => $laws->implode(',')]);
    }
}
