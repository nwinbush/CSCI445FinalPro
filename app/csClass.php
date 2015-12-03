<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class csClass extends Model
{
    protected $table = 'classes';

    protected $fillable = ['course_num'];
}
