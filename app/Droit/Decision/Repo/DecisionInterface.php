<?php namespace App\Droit\Decision\Repo;

interface DecisionInterface {

    public function getAll();
    public function getDates(array $dates);
    public function getMissingDates(array $dates);
    public function search($terms = null, $categorie = null, $publish = null);
    public function find($data);
    public function create(array $data);
    public function update(array $data);
    public function delete($id);

}
