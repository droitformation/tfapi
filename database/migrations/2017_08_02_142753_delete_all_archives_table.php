<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteAllArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('wp_archives');
        Schema::dropIfExists('wp_archives_2');
        Schema::dropIfExists('wp_archives_3');
        Schema::dropIfExists('wp_archives_4');

        Schema::dropIfExists('archive_2012');
        Schema::dropIfExists('archive_2013');
        Schema::dropIfExists('archive_2014');
        Schema::dropIfExists('archive_2015');
        Schema::dropIfExists('archive_2016');
        Schema::dropIfExists('archive_2017');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
