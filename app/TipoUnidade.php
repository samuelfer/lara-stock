<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUnidade extends Model
{
     protected $table = 'tipo_unidade';

    protected $fillable = [
    	'nome'
    ];
}
