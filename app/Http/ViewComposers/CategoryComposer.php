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
        $categories = \App\Droit\Wordpress\Entites\Taxonomy::topCategories()->get();
        $categories = $categories->slice(1)->pluck('term');

        $view->with('categories', $categories);
    }
}
