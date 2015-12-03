<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('languages', function (Blueprint $table) {
            $table->string('language');
            $table->timestamps();
        });
        Schema::create('teamStyle', function (Blueprint $table) {
            $table->string('style');
            $table->timestamps();
        });
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
        Schema::create('UserData', function (Blueprint $table) {
            $table->integer('id')->references('id')->on('users');
            $table->string('name');
            $table->string('preferred_language')->references('languages')->on('language');
            $table->string('team_style')->references('teamStyle')->on('style');
            $table->integer('team_id')->references('id')->on('teams')->nullable();
            $table->nullableTimestamps();
        });
        Schema::create('classes', function (Blueprint $table) {
            $table->string('course_num');
            $table->timestamps();
        });
        Schema::create('classesTaken', function (Blueprint $table) {
            $table->integer('user_id')->references('id')->on('users');
            $table->string('course_num')->references('classes')->on('course_num');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('UserData');
        Schema::drop('teams');
        Schema::drop('classesTaken');
        Schema::drop('languages');
        Schema::drop('teamStyle');
        Schema::drop('classes');
    }
}
