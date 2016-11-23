<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    $collec = (new MongoDB\Client)->fileapi->index;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    $mongo = new MongoDB\Client;
    }
}
