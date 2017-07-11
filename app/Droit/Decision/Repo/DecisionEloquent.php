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
        return $this->decision->all();
    }

    public function getDates(array $dates)
    {
        return $this->decision->select('publication_at')->whereIn('publication_at', $dates)->groupBy('publication_at')->get();
    }
    
    public function find($id){

        return $this->decision->with(['categorie'])->findOrFail($id);
    }

    public function search($terms = null, $categorie = null, $publish = null)
    {
       return $this->decision->with(['categorie'])
           ->search($terms)
           ->categorie($categorie)
           ->publication($publish)
           ->toSql();
    }

    public function create(array $data){

        $decision = $this->decision->create(array(
            'publication_at' => $data['publication_at'],
            'decision_at'    => $data['decision_at'],
            'categorie_id'   => isset($data['categorie_id']) ? $data['categorie_id'] : null,
            'remarque'       => isset($data['remarque']) ? $data['remarque'] : null,
            'numero'         => $data['numero'],
            'texte'          => isset($data['texte']) ? $data['texte'] : '',
            'langue'         => isset($data['langue']) ? $data['langue'] : 0,
            'publish'        => isset($data['publish']) ? $data['publish'] : null,
            'updated'        => isset($data['updated']) ? $data['updated'] : null,
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
