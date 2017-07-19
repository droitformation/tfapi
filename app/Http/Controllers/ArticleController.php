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
        $user = $repo->find(1);

        $decision = factory(\App\Droit\Decision\Entities\Decision::class)->make([
            'texte' =>
                '<div>Dapibus ante accumasa laoreet mauris nostra torquenté blandît néc lobortis duèis, ùrci fringilla taciti senectus malésdum félis morbié 
                suscipit dictumst métus, çunc himenaéos namé primis ultrûcéas anonyma lilitoxic cras dictum. Nombre phaséllœs nîbh fuscé Frînglilia égét 
                eu sit in quam lobortïs phasellus pellentesque lorém arcû in quisqué éuismod metus enim imperdiet egéstat ligula àc voluptà torquent sapien 
                placérat liçlà à, nullä ultrices Assurance de Protection Juridique SA égét 44 395€ dapidûs quisque à nullä dui congue ïpsum séd léo séd hac.
                Conges quém mattis sènèctus malesuada énis aliquet dictum ullamcorper d\'accumasa à porta conséquat, lobortis convallis èiam condimentum lacinia vulputaté
                ïn metus litora sit vulputaté vélit, consequat liçlà</div>.

                <div>Morbi phasellus c\'est torquenté malésdum aptenté l\'2 068€ duis sem fancibüs classé d\'adipiscing duis, rutrum malésdum elementum mi est 
                velit faucibus élémentum interdum nequé congue ?
                leçtus, bibéndum pharetra bibéndum urna bibéndum aptenté sagittis énis molestie vehicula non interdùm, vehiculâ suscipit alèquam. Lorem ad 
                quîs j\'libéro pharétra vivamus mollis ultricités ut, vulputaté ac pulvinar èst commodo aenanm pharétra cubilia, lacus aenean pharetra des 
                ïd quisquées mauris varius sit. Mie dictumst nûllam çurcus molestié imperdiet vestibulum suspendisse tempor habitant sit pélléntésque sit 
                çunc, primiés?</div>',
        ]);
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
        echo '<pre>';
        print_r($user);
        echo '</pre>';exit();

        foreach ($user->abos as $abo){
            echo '<pre>';
            print_r($abo->load('published'));
            echo '</pre>';
        }

    }
}
