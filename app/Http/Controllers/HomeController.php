<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Droit\Wordpress\Repo\PostRepo;

class HomeController extends Controller
{
    protected $post_repo;

    public function __construct(PostRepo $post_repo)
    {
        $this->post_repo = $post_repo;
    }

    public function index()
    {
        return view('frontend.index');
    }

    public function page($slug)
    {
        $page = $this->post_repo->getBySlug($slug);

        return view('frontend.page')->with(['page' => $page]);
    }
}
