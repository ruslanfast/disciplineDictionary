<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Permissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    if ( ! Schema::hasTable('permissions') ){
		    Schema::create('permissions', function( Blueprint $table ){
			    $table->increments('id');
			    $table->string('name');
		    } );
	    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('permissions');
    }
}
