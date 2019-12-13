<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteOnCascade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('players', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('game_id')->references('id')->on('games');
        });
        Schema::table('scores', function($table) {
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('hole_id')->references('id')->on('holes')->onDelete('cascade');
        });
        Schema::table('games', function ($table) {
            $table->foreign("user_id")->references('id')->on('users')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
        Schema::table('holes', function ($table) {
            $table->foreign("course_id")->references('id')->on('courses')->onDelete('cascade');
        });
        Schema::table('courses', function ($table) {
            $table->foreign('minigolf_id')->references('id')->on('minigolfs')->onDelete('cascade');
        });
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
