<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class language extends Model
{
    protected $table = 'languages';

    protected $fillable = ['language'];


//Schema::create('languages', function (Blueprint $table) {
//    $table->string('language');
//    $table->timestamps();
//});
}
