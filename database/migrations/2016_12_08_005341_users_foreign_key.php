<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::table('users', function( $table )
            {
                $table->foreign('faculty_id')->references('id')->on('faculties');
                $table->foreign('permission_id')->references('id')->on('permissions');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function( $table ){
            $table->dropForeign(['faculty_id']);
            $table->dropForeign(['permission_id']);
        });
    }
}
