<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    //

    protected $table = 'UserData';

    protected $fillable = [ 'name', 'preferred_language', 'team_style', 'team_id', 'user_id', 'taken_algorithms', 'taken_programming_class', 'isAdmin'];

    public function classesTaken(){
        return $this->hasMany('App\ClassesTaken');
    }

    public function team(){
        return $this->hasOne('App\Team');
    }

//Schema::create('UserData', function (Blueprint $table) {
//    $table->integer('user_id')->references('id')->on('users');
//    $table->string('name');
//    $table->string('preferred_language')->references('languages')->on('language');
//    $table->string('team_style')->references('teamStyle')->on('style');
//    $table->integer('team_id')->references('id')->on('teams');
//});
}
