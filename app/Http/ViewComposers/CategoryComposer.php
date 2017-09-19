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
        $taxonomy_repo = \App::make('App\Droit\Wordpress\Repo\TaxonomyRepo');

        $top_categories = $taxonomy_repo->getTopCategories();

        $view->with('top_categories', $top_categories);
    }
}
