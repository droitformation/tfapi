<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Droit\Bger\Worker\UpdateInterface;
use App\Droit\Decision\Repo\DecisionInterface;

class ArticleController extends Controller
{
    protected $update;
    protected $decision;

    public function __construct(UpdateInterface $update, DecisionInterface $decision)
    {
        $this->update = $update;
        $this->decision = $decision;
    }

    public function update()
    {
        /*  $this->update->missing()->update();*/

        $arret     = new \App\Droit\Bger\Utility\Decision();
        $liste     = new \App\Droit\Bger\Utility\Liste();

        $all = $liste->getList(true);
        $in = $this->decision->getMissingDates($all->toArray());

         $worker = \App::make('App\Droit\Decision\Worker\DecisionWorkerInterface');
        // $result = $worker->update();

        echo '<pre>';
        //print_r($all->format());
        //print_r($result);
        echo '</pre>';
        exit();

        $liste->setUrl('20161021');

        $decisions = $liste->getListDecisions();

        if(!$decisions->isEmpty()){
            foreach($decisions as $decision){
                $new = $arret->setDecision($decision)->getArret();
                $this->decision->create($new);
            }
        }

        $result = $arret->setDecision($decisions->first())->getArret();


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
