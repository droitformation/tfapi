<?php namespace  App\Droit\Categorie\Worker;

use App\Droit\Categorie\Worker\CategorieWorkerInterface;
use App\Droit\Categorie\Repo\CategorieKeywordInterface;
use App\Droit\Decision\Repo\DecisionInterface;

class CategorieWorker implements CategorieWorkerInterface
{
    protected $keyword;
    protected $decision;

    public function __construct(CategorieKeywordInterface $keyword, DecisionInterface $decision)
    {
        $this->keyword  = $keyword;
        $this->decision = $decision;
    }

    public function process($decision)
    {
        $keywords = $this->keyword->getAll();

        $categories = $keywords->groupBy('categorie_id')->map(function($keyword){
            return $keyword->pluck('keywords_list')->toArray();
        });

        $results = $categories->map(function ($keywords, $categorie_id) {
            return collect($keywords)->map(function ($keyword){
                return $this->decision->search(['terms' => $keyword]);
            });
        });

        return $results;

    }
}