<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modello extends Model
{

    protected $table = 'modellos';
    public $timestamps = true;
    protected $fillable = array('title' , 'gb');

 
}