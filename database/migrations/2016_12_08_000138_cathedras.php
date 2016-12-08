<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cathedras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( ! Schema::hasTable('departments') ) {
            Schema::create('departments', function( Blueprint $table )
            {
                $table->increments('id');
                $table->string('name');
                $table->integer('faculty_id')->unsigned();
            });

            Schema::table('departments', function( $table )
            {
                $table->foreign('faculty_id')->references('id')->on('faculties');
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
        Schema::dropIfExists('departments');
    }
}
