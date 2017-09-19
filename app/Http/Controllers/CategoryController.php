<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Droit\Wordpress\Repo\TaxonomyRepo;
use App\Droit\Wordpress\Repo\PostRepo;

class CategoryController extends Controller
{
    protected $taxonomy_repo;
    protected $post_repo;

    public function __construct(TaxonomyRepo $taxonomy_repo, PostRepo $post_repo)
    {
        setlocale(LC_ALL, 'fr_FR.UTF-8');

        $this->taxonomy_repo = $taxonomy_repo;
        $this->post_repo = $post_repo;
    }

    public function index()
    {
        return view('frontend.category')->with(['open' => true]);
    }

    public function show($id,$year = null)
    {
        $categorie  = $this->taxonomy_repo->getCategorieBySlug($id);
        $categories = $this->taxonomy_repo->getCategoryWithChildren($id);
        $posts      = $this->post_repo->getPostByCategoryAndYear($id,$year);
        $years      = $this->taxonomy_repo->getYears();

        return view('frontend.category')->with(['categorie' => $categorie, 'categories' => $categories, 'posts' => $posts, 'years' => $years, 'current' => $year]);
    }
}
