<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($id)
    {
        $post = \App\Droit\Wordpress\Entites\Post::getPostsByCategories([27]);

        echo '<pre>';
        print_r($post);
        echo '</pre>';exit();

    }
}
