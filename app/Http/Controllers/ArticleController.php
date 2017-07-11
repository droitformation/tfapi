<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Droit\Bger\Worker\UpdateInterface;

use App\Events\DateUpdated;

class ArticleController extends Controller
{
    protected $update;

    public function __construct(UpdateInterface $update)
    {
        $this->update = $update;
    }

    public function update()
    {
        /*  $this->update->missing()->update();*/

        $fetch     = new \App\Droit\Bger\Utility\Fetch();
        $decisions = $fetch->getListDecisions('161021');
        $result    = $fetch->prepareArret($decisions->first());

        echo '<pre>';
        print_r($result);
        echo '</pre>';
        exit();

        redirect('article');
    }

    public function search()
    {
         $term = 'Détention';

         $articles = \App\Droit\Decision\Entities\Decision::where('texte','LIKE','%'.$term.'%')
             ->orWhere('remarque','LIKE','%'.$term.'%')
             ->get();

        //return $this->dispatch->findCategory('Assicurazione contro le malattie');

        echo '<pre>';
        print_r($articles->toArray());
        echo '</pre>';exit();
    }

    public function test()
    {
        $articles = \App\Droit\Decision\Entities\Decision::orderBy('id','DESC')->take(1)->get();

        return view('article')->with(['article' => $articles->first()]);
    }
}
