<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
    }

    /**
     *
     * @return Response
     */
    public function index()
    {
        $posts = \App\Droit\Wordpress\Entites\Post::type()->status()->with(['postmetas','categories'])->take(1)->get();

        $post = $posts->first();

/*        $taxonomies = $post->taxonomies->map(function ($item, $key) {
            return [$item->taxonomy => $item['term']];
        });*/

        echo '<pre>';
        print_r($post->categories);
        echo '</pre>';exit;

        return view('backend.index');
    }
}
