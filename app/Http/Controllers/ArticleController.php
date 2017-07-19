<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Droit\Bger\Worker\UpdateInterface;
use App\Droit\Decision\Repo\DecisionInterface;
use Illuminate\Support\Facades\App;

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

        $dates = collect([
            \Carbon\Carbon::createFromDate(2017, 6, 5)->startOfDay()->toDateTimeString(),
            \Carbon\Carbon::createFromDate(2017, 6, 6)->startOfDay()->toDateTimeString(),
        ]);

       // $worker = App::make('App\Droit\Decision\Worker\DecisionWorkerInterface');
        //$worker->setMissingDates($dates)->update();


        //dispatch(new \App\Jobs\UpdateDateDecisions());
      // \Mail::to('cindy.leschaud@gmail.com')->queue(new \App\Mail\SuccessNotification('Mise à jour des commencé'));

        echo '<pre>';

        print_r($in);
        echo '</pre>';
        exit();

/*        $liste->setUrl('20161021');

        $decisions = $liste->getListDecisions();

        if(!$decisions->isEmpty()){
            foreach($decisions as $decision){
                $new = $arret->setDecision($decision)->getArret();
                $this->decision->create($new);
            }
        }

        $result = $arret->setDecision($decisions->first())->getArret();*/


        redirect('article');
    }

    public function search()
    {
         \Mail::to('cindy.leschaud@gmail.com')->send(new \App\Mail\AlerteDecision());

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
        setlocale(LC_ALL, 'fr_FR.UTF-8');

        $repo   = App::make('App\Droit\Decision\Repo\DecisionInterface');
        $arrets = $repo->getAll()->take(5);
/*        echo '<pre>';
        print_r($arrets);
        echo '</pre>';exit();*/
        return view('emails.alert')->with(['arrets' => $arrets]);
    }

    public function abos(){

        $repo_dec   = App::make('App\Droit\Decision\Repo\DecisionInterface');
        $repo   = App::make('App\Droit\User\Repo\UserInterface');
        $repo_k   = App::make('App\Droit\Categorie\Repo\CategorieKeywordInterface');
        $keywords = $repo_k->getAll();


     /*   $user = factory(\App\Droit\User\Entities\User::class)->create();
        $abo = factory(\App\Droit\Abo\Entities\Abo::class)->create([
            'user_id'  => $user->id,
            'keywords' => '"Assurance de Protection Juridique SA"',
        ]);

        $abo1 = factory(\App\Droit\Abo\Entities\Abo::class)->create([
            'user_id'  => $user->id,
            'keywords' => '"recours en matière civile","canton de Genève"',
        ]);*/

// KeywordsList

        $found = $repo_dec->search(['Katholische Kirchgemeinde Luzern'],184,1);

        /*
               echo '<pre>';
                print_r($found);
                echo '</pre>';exit(); */

     /*   $keywords = $user->abos->groupBy('categorie_id')->map(function($keywods){
            return $keywods->pluck('keywords_list')->flatten();
        });
*/


        $decision = factory(\App\Droit\Decision\Entities\Decision::class)->create([
            'texte' =>
                '<div>Dapibus à nul LLCA de Protection Juridique SA égét 44 3€ dapidûs quisque à nullä dui cctus malet, consequat liçlà</div>.'
        ]);


        $worker = App::make('App\Droit\Categorie\Worker\CategorieWorkerInterface');

        $array = $worker->process($decision);

        echo '<pre>';
        print_r($array);
        echo '</pre>';exit();

        foreach ($user->abos as $abo){
            echo '<pre>';
            print_r($abo->load('published'));
            echo '</pre>';
        }

    }
}
