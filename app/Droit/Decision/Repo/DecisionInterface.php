<?php namespace App\Droit\Decision\Repo;

interface DecisionInterface {

    public function getAll();
    public function getDates(array $dates);
    public function getMissingDates(array $dates);
    public function getYear($year);
    public function search($params);
    public function find($data);
    public function findByNumeroAndDate($numero,$date);
    public function create(array $data);
    public function update(array $data);
    public function delete($id);

}
