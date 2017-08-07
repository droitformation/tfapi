<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Droit\Decision\Repo\DecisionInterface;
use Illuminate\Support\Facades\App;
use \ForceUTF8\Encoding;

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


       // $worker->setMissingDates($dates)->update();
        $data =  [
            'numero'         => '4A_578/2016',
            'categorie'      => 'Droits réels',
            'subcategorie'   => 'mesures provisionnelles (rectification du registre foncier)',
            'publication_at' => '2017-08-04',// 20170804
            'decision_at'    => '2017-06-27', // 27.06.2017
        ];

        $arret  = App::make('App\Droit\Decision\Worker\DecisionWorkerInterface');
        $class  = new \App\Droit\Bger\Utility\Decision();
        $worker = new \App\Droit\Bger\Utility\Liste();

        $decisions = $worker->setUrl('2017-04-03')->getListDecisions();

        //header('Content-Type: text/html; charset=UTF-8');

        //$repo = \App::make('App\Droit\Decision\Repo\DecisionInterface');
       // $repo->create($result);

        //dispatch(new \App\Jobs\SendDailyAlert());
      // \Mail::to('cindy.leschaud@gmail.com')->queue(new \App\Mail\SuccessNotification('Mise à jour des commencé'));

        echo '<pre>';
        print_r($decisions);
        echo '</pre>';exit();

       if(!$decisions->isEmpty()){
            foreach($decisions as $decision){
                $new = $arret->setDecision($decision)->getArret();
                $this->decision->create($new);
            }
        }
/*
        $result = $arret->setDecision($decisions->first())->getArret();
*/


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

        // 2017-03-20
      // Missing dates to update
        $start_date = \Carbon\Carbon::createFromDate(2017, 4, 1)->startOfDay();
        $end_date   = \Carbon\Carbon::createFromDate(2017, 4, 31)->startOfDay();
        $missing    = collect(generateDateRange($start_date, $end_date));

        $worker = \App::make('App\Droit\Decision\Worker\DecisionWorkerInterface');
        //$worker->setMissingDates($missing)->update();

        exit;

/*

        $repo = \App::make('App\Droit\Decision\Repo\DecisionInterface');

        $results = collect([]);

        foreach ($tables as $table) {

            $result  = $repo->searchArchives('archive_'.$table,['2015-01-01','2016-09-01'],'Cindy Leschaud');
            $results = $results->merge($result);
        }

        echo '<pre>';
        print_r($results);
        echo '</pre>';exit;*/

        // Table correspondances
        $archives = [
            2012 => 'wp_archives',
            2013 => 'decisions',
            2014 => 'wp_archives_2',
            2015 => 'wp_archives_3',
            2016 => 'wp_archives_4'
        ];

        // Make archives
        $table = new \App\Droit\Bger\Utility\Table();

        //$tables = archiveTableForDates('2015-01-01', '2016-03-01');
        //foreach ($archives as $year => $archive) {}

       // $table->mainTable = 'decisions';
       // $table->setYear(2013)->create()->transfertArchives();
       // $table->deleteLastYear();

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
