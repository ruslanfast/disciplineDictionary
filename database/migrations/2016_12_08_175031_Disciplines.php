<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Disciplines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( ! Schema::hasTable('disciplines') ) {

            Schema::create('disciplines', function( Blueprint $table ){
                $table->increments('id');
                $table->string('name');
                $table->integer('academic_time');
                $table->integer('user_id')->unsigned();
                $table->integer('department_id')->unsigned();
            });

            Schema::table('disciplines', function( $table ){
                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('department_id')->references('id')->on('departments');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('disciplines');
    }
}
