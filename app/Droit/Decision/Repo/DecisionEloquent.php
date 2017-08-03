<?php namespace  App\Droit\Decision\Repo;

use  App\Droit\Decision\Repo\DecisionInterface;
use  App\Droit\Decision\Entities\Decision as M;

class DecisionEloquent implements DecisionInterface{

    protected $decision;

    public function __construct(M $decision)
    {
        $this->decision = $decision;
    }

    public function getAll()
    {
        return $this->decision->with(['categorie'])->get();
    }

    public function getYear($year){

        return $this->decision->whereYear('publication_at', $year)->get();
    }

    public function getDates(array $dates)
    {
        return $this->decision->select('publication_at')->whereIn('publication_at', $dates)->groupBy('publication_at')->get();
    }

    public function getMissingDates(array $dates)
    {
        $exist = $this->decision->select('publication_at')->whereIn('publication_at', $dates)->get();

        return collect(array_diff($dates, $exist->pluck('publication_at')->all()))->unique();
    }
    
    public function find($id){

        return $this->decision->with(['categorie'])->findOrFail($id);
    }

    public function findByNumeroAndDate($numero,$date){

        $found = $this->decision->where('numero','=',$numero)->where('publication_at','=',$date)->get();

        return !$found->isEmpty() ? $found->first() : false;
    }

    // $params array terms, categorie, published, publications_at
    public function search($params)
    {
        $terms     = isset($params['terms']) && !empty($params['terms']) ? $params['terms'] : null;
        $categorie = isset($params['categorie']) ? $params['categorie'] : null;
        $published = isset($params['published']) ? $params['published'] : null;
        $publication_at = isset($params['publication_at']) ? $params['publication_at'] : null;

        return $this->decision->with(['categorie'])
            ->search($terms)
            ->categorie($categorie)
            ->published($published)
            ->publicationAt($publication_at)
            ->groupBy('id')
            ->get();
    }

    public function searchArchives($table,$period,$terms)
    {
        return $this->decision->setTable($table)->whereBetween('publication_at', $period)->whereRaw("MATCH (texte) AGAINST ('$terms')")->get();
    }

    public function create(array $data){

        $decision = $this->decision->create(array(
            'publication_at' => $data['publication_at'],
            'decision_at'    => $data['decision_at'],
            'categorie_id'   => isset($data['categorie_id']) ? $data['categorie_id'] : null,
            'remarque'       => isset($data['remarque']) ? $data['remarque'] : null,
            'numero'         => $data['numero'],
            'link'           => isset($data['link']) ? $data['link'] : '',
            'texte'          => isset($data['texte']) ? $data['texte'] : '',
            'langue'         => isset($data['langue']) ? $data['langue'] : 0,
            'publish'        => isset($data['publish']) ? $data['publish'] : null,
            'updated'        => isset($data['updated']) ? $data['updated'] : null,
            'created_at'     => \Carbon\Carbon::now(),
            'updated_at'     => \Carbon\Carbon::now()
        ));

        if( ! $decision )
        {
            return false;
        }

        return $decision;

    }

    public function update(array $data){

        $decision = $this->decision->findOrFail($data['id']);

        if( ! $decision )
        {
            return false;
        }

        $decision->fill($data);
        $decision->save();

        return $decision;
    }

    public function delete($id){

        $decision = $this->decision->find($id);

        return $decision->delete();
    }

}
