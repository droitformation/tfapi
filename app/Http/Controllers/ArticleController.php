<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Droit\Decision\Repo\DecisionInterface;
use Illuminate\Support\Facades\App;

class ArticleController extends Controller
{
    protected $decision;

    public function __construct( DecisionInterface $decision)
    {
        setlocale(LC_ALL, 'fr_FR.UTF-8');

        $this->decision = $decision;
    }

    public function update()
    {
        /*  $this->update->missing()->update();*/

        //$all = $liste->getList(true);
        //$in = $this->decision->getMissingDates($all->toArray());

        $dates = collect([
            \Carbon\Carbon::createFromDate(2017, 7, 20)->startOfDay()->toDateTimeString(),
            \Carbon\Carbon::createFromDate(2017, 7, 21)->startOfDay()->toDateTimeString(),
        ]);

       // $worker = App::make('App\Droit\Decision\Worker\DecisionWorkerInterface');
       // $worker->setMissingDates($dates)->update();
        $data =  [
            'numero'         => '4A_577/2016',
            'categorie'      => 'Droits réels',
            'subcategorie'   => 'mesures provisionnelles (rectification du registre foncier)',
            'publication_at' => '2017-07-18',
            'decision_at'    => '2017-04-25',
        ];

        $class = new \App\Droit\Bger\Utility\Decision();
        $class->setDecision($data);
        $result = $class->grabHtml();

       // header('Content-Type: text/html; charset=utf-8');

        echo '<pre>';
        print_r($result);
        echo '</pre>';exit();
        //dispatch(new \App\Jobs\SendDailyAlert());
      // \Mail::to('cindy.leschaud@gmail.com')->queue(new \App\Mail\SuccessNotification('Mise à jour des commencé'));

        echo '<pre>';

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


       // redirect('article');
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

/*
        factory(\App\Droit\Decision\Entities\Decision::class)->create([
            'categorie_id' => 174, 'publication_at' => $date, 'texte' => '<div>Dapibus ante accumasa laoreelentesque lorém arcû in quisqué éuismod m44equat liçlà</div>.'
        ]);

        factory(\App\Droit\Decision\Entities\Decision::class)->create([
            'categorie_id' => 175,'publication_at' => $date, 'texte' => '<div>Dapibus à nul A égét 44 3€ BGFA quisque à nullä dui cctus malet, consequat liçlà</div>.'
        ]);

        factory(\App\Droit\Decision\Entities\Decision::class)->create([
            'categorie_id' => 176,'publication_at' => $date, 'texte' => '<div>Dapibus à nul de chose égét 44 3€ quisque à nullä dui cctus malet, consequat liçlà</div>.'
        ]);

        factory(\App\Droit\Decision\Entities\Decision::class)->create([
            'categorie_id' => 177,'publication_at' => $date, 'texte' => '<div>Dapibus à nul de judiciaire égét 4 3€ quisque à nullä dui cctus , consequat liçlà</div>.'
        ]);
*/
        $data1 = [
            ['categorie' => '175', 'keywords' => '"à nul de chose égét"'],
            ['categorie' => '177', 'keywords' => '"judiciaire égét"'],
            ['categorie' => '176', 'keywords' => '"44 3€"']
        ];

        $publication_at = \Carbon\Carbon::today()->startOfDay()->addMonth()->toDateTimeString();

        $make = new \tests\factories\ObjectFactory();
        $data2 = [
            ['categorie_id' => 174, 'texte' => '<div>Accumasa laoreelentesque lorém arcû in quisqué éuismod m44equat liçlà</div>.'],
            ['categorie_id' => 175, 'texte' => '<div>Dapibus à nul A égét 44 3€ BGFA quisque à nullä dui cctus malet, consequat liçlà</div>.'],
            ['categorie_id' => 176, 'texte' => '<div>Nul de chose égét 44 3€ quisque à nullä dui cctus malet, consequatà</div>.'],
            ['categorie_id' => 177, 'texte' => '<div>Judiciaire égét quisque à nullä dui cctus , consequat liçlà</div>.']
        ];

        $decisions = $make->makeDecisions($publication_at,$data2);

        $user = $make->makeUser();
        $make->multipleAbos($user,$data1);


        $alert  = App::make('App\Droit\Bger\Worker\AlertInterface');
        $alert->setCadence('daily')->setDate($publication_at);
        $users = $alert->getUsers();
/*        echo '<pre>';
        print_r($users);
        echo '</pre>';exit;*/
        foreach ($users as $user) {
           // echo view('emails.alert')->with(['user' => $user['user'], 'date' => \Carbon\Carbon::today()->startOfDay(), 'arrets' => $user['abos']]);
        }

        dispatch(new \App\Jobs\SendDailyAlert(\Carbon\Carbon::today()->addMonth()->startOfDay()));
    }

    public function abos(){



        /*   $repo_dec   = App::make('App\Droit\Decision\Repo\DecisionInterface');
        $repo   = App::make('App\Droit\User\Repo\UserInterface');
        $repo_k   = App::make('App\Droit\Categorie\Repo\CategorieKeywordInterface');
        $user = $repo->find(2);

        $found = $repo_dec->search(['terms' => null, 'categorie' => 176, 'published' => null, 'publication_at' => $publication_at]);


        echo '<pre>';
        print_r($found);
        echo '</pre>';exit();*/

        $publication_at = \Carbon\Carbon::today()->startOfDay()->toDateTimeString();

/*        $data = [
            ['categorie_id' => 174, 'texte' => '<div>Accumasa laoreelentesque lorém arcû in quisqué éuismod m44equat liçlà</div>.'],
            ['categorie_id' => 175, 'texte' => '<div>Dapibus à nul A égét 44 3€ BGFA quisque à nullä dui cctus malet, consequat liçlà</div>.'],
            ['categorie_id' => 176, 'texte' => '<div>Nul de chose égét 44 3€ quisque à nullä dui cctus malet, consequatà</div>.'],
            ['categorie_id' => 177, 'texte' => '<div>Judiciaire égét quisque à nullä dui cctus , consequat liçlà</div>.']
        ];

        $make = new \tests\factories\ObjectFactory();
        $decisions = $make->makeDecisions($publication_at,$data);*/

        /*        $user = factory(\App\Droit\User\Entities\User::class)->create([
                'active_until' => \Carbon\Carbon::today()->startOfDay()->addMonth()->toDateTimeString(),
                            'cadence'      => 'daily',
                        ]);

                        $abo1 = factory(\App\Droit\Abo\Entities\Abo::class)->create(['user_id'  => $user->id, 'categorie_id' => 174, 'keywords' => '"Accumasa laoreelentesque"']);
                        $abo2 = factory(\App\Droit\Abo\Entities\Abo::class)->create(['user_id'  => $user->id, 'categorie_id' => 175, 'keywords' => '"à nul A égét 44",BGFA']);
                        $abo3 = factory(\App\Droit\Abo\Entities\Abo::class)->create(['user_id'  => $user->id, 'categorie_id' => 176, 'keywords' => null]);*/


        $alert  = \App::make('App\Droit\Bger\Worker\AlertInterface');
        $alert->setCadence('daily')->setDate($publication_at);
        $users = $alert->getUsers();

        dispatch(new \App\Jobs\UpdateDateDecisions());

        echo '<pre>';
        print_r($users);
        echo '</pre>';exit();

    }
}
