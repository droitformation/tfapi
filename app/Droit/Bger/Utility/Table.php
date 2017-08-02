<?php
/**
 * Created by PhpStorm.
 * User: cindyleschaud
 * Date: 02.08.17
 * Time: 10:54
 */

namespace App\Droit\Bger\Utility;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Table
{
    public $prefix = 'archive_';
    public $yearStart = '2012';
    public $year;

    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    public function getTableName(){

        return $this->prefix.$this->year;
    }

    public function create(){

        if (!Schema::hasTable($this->prefix.$this->year)) {

            Schema::create($this->prefix.$this->year, function (Blueprint $table) {
                $table->increments('id');
                $table->string('numero');
                $table->dateTime('publication_at');
                $table->dateTime('decision_at');
                $table->integer('categorie_id')->nullable();
                $table->text('remarque')->nullable();
                $table->string('link')->nullable();
                $table->longText('texte')->nullable();
                $table->tinyInteger('langue')->nullable();
                $table->tinyInteger('publish')->nullable();
                $table->tinyInteger('updated')->nullable();
                $table->timestamps();
            });

        }

        return $this;
    }

    public function transfertArchives()
    {
        $name = $this->getTableName();

        \DB::table('wp_archives')->whereYear('publication_at', $this->year)->orderBy('id')->chunk(100, function ($decisions) use ($name) {
            foreach ($decisions as $decision) {
                \DB::table($name)->insert((array) $decision);
            }
        });

    }

}