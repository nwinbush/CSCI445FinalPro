<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = ['name'];

    public function users(){
        return $this->hasMany('App\User');
    }
}
