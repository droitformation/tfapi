<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class CategoryComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $top_categories = \App\Droit\Wordpress\Entites\Taxonomy::topCategories()->get();
        $top_categories = $top_categories->slice(1)->pluck('term');

       // $all_categories = \App\Droit\Wordpress\Entites\Taxonomy::all();
        //$all_categories = $all_categories->slice(1)->pluck('term');

        $view->with('top_categories', $top_categories);
        //$view->with('all_categories', $all_categories);
    }
}
