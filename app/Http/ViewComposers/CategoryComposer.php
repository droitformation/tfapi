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
        $top_categories = \Corcel\Model\Taxonomy::where('taxonomy', 'category')->where('parent','=',0)->get();
        $top_categories = $top_categories->pluck('term');

        $view->with('top_categories', $top_categories);
    }
}
