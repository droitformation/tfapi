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

        $publication_at = \Carbon\Carbon::today()->startOfDay()->toDateTimeString();

        $table = new \App\Droit\Bger\Utility\Table();
        $table->setYear(2012)->create()->transfertArchives();

        //$repo = App::make('App\Droit\Decision\Repo\DecisionInterface');
        //$decisisions = $repo->getYear(2016);

        //$name = $table->getTableName();

        //\DB::table($name)->insert($decisisions->toArray());

        echo '<pre>';
       // print_r($name);
        //print_r($decisisions->toArray());
        echo '</pre>';exit();
    }

    public function abos(){

        $data1 = [
            ['categorie' => '175', 'keywords' => '"à nul de chose"'],
            ['categorie' => '177', 'keywords' => '"Judicvdiaire égét"'],
            ['categorie' => '176', 'keywords' => '"44 3€"']
        ];

        $data3 = [
            ['categorie_id' => 174, 'texte' => '<div>Accudmasa laoreesdvlentesque lorém arcû in quisqué éuismod m44equat liçlà</div>.'],
            ['categorie_id' => 175, 'texte' => '<div>Dapibus à nul A égét 44 3€ BGFA quisque à nullä dui cctus malet, consvdsequat liçlà</div>.'],
            ['categorie_id' => 176, 'texte' => '<div>Nul de chose égét 44 3€ quisque à nullä dui cctus malet, confdsequatà</div>.'],
            ['categorie_id' => 177, 'texte' => '<div>Judicvdiaire égét quisque à nullä dui cctus , conseqdcuat liçlà</div>.']
        ];

        $data2 = [
            ['categorie' => '175', 'keywords' => '"Accumasa laoreelentesque"'],
            ['categorie' => '177', 'keywords' => '"consequat liçlà"'],
            ['categorie' => '176', 'keywords' => '"Judiciaire"']
        ];

        $data4 = [
            ['categorie_id' => 174, 'texte' => '<div>Accumasa laoreelentesque lorém arcû in quisqué éuismod m44equat liçlà</div>.'],
            ['categorie_id' => 175, 'texte' => '<div>Dapibus à nul A égét  BGFA quisque à nullä dui cctus malet, consequat liçlà</div>.'],
            ['categorie_id' => 176, 'texte' => '<div>Nul chose quisque à nullä dui cctus malet, consequatà</div>.'],
            ['categorie_id' => 177, 'texte' => '<div>Judiciaire égét quisque à nullä dui cctus , consequat liçlà</div>.']
        ];

        $publication_at = \Carbon\Carbon::today()->startOfDay()->toDateTimeString();
        $publication_at2 = \Carbon\Carbon::tomorrow()->startOfDay()->toDateTimeString();

        $make = new \tests\factories\ObjectFactory();

        /*

        $decisions = $make->makeDecisions($publication_at,$data3);
        $decisions2 = $make->makeDecisions($publication_at2,$data4);

        $user  = $make->makeUser(['cadence' => 'weekly']);
        $make->multipleAbos($user,$data1);

        $user2 = $make->makeUser(['cadence' => 'daily']);
        $make->multipleAbos($user2,$data2);
        */
        $repo = App::make('App\Droit\User\Repo\UserInterface');
        $user = $repo->find(2);

        $today  =  $publication_at = \Carbon\Carbon::today()->startOfDay();
        $tomorrow  =  $publication_at = \Carbon\Carbon::today()->startOfDay()->toDateString();
        /*    */
        $monday = $today->startOfWeek();
        $friday = $today->startOfWeek()->parse('this friday');

        $dates = generateDateRange($monday, $friday);

        //$make->multipleAbos($user,$data1);

        $alert  = App::make('App\Droit\Bger\Worker\AlertInterface');
        $alert->setCadence('daily')->setDate($tomorrow);

        $users = $alert->getUsers();

        /*
                echo '<pre>';
                print_r($users);
                echo '</pre>';exit;*/

        foreach ($users as $users) {
            echo view('emails.alert')->with(['user' => $users['user'], 'date' => $tomorrow, 'arrets' => $users['abos']]);
        }

    }
}
