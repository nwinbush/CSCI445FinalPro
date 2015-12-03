<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassesTaken extends Model
{

    protected $table = 'classesTaken';


    protected $fillable = ['user_id', 'course_num'];
}
