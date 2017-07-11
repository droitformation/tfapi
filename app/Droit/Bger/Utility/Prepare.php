<?php

namespace App\Droit\Bger\Utility;

/*
* Class to prepare data
*/

class Prepare
{
    public function terms($search){

        $search = htmlspecialchars_decode($search);

        return collect(explode(',',$search))->groupBy(function ($item, $key) {
            return preg_match('/\"([^\"]*?)\"/', $item, $m) ? 'quotes' : 'noquotes';
        })->map(function ($items, $key) {
            return $items->map(function ($item, $key) {
                return trim(str_replace('"', '', $item));
            });
        })->flatten();

    }
}