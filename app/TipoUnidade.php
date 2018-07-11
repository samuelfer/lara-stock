<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUnidade extends Model
{
     protected $table = 'tipo_unidade';

    protected $fillable = [
    	'nome'
    ];

    public function produto()
    {
        return $this->belongsTo(TipoUnidade::class, 'tipo_unidade_id', 'id');
    }
}
