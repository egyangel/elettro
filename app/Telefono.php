<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{

    protected $table = 'telefonos';
    public $timestamps = true;
    protected $fillable = array('id_marca', 'id_modello', 'q1', 'q2', 'q3', 'prezzo');

 
}