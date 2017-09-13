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
        $top_categories = $top_categories->pluck('name','term_id');

        $view->with('top_categories', $top_categories);
    }
}
