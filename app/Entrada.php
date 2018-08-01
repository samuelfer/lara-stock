<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $table = 'entrada';

    protected $fillable = [
        'data',
        'nota_fiscal',
        'valor',
        'observacao'
    ];

    public function entrada_detalhe()
    {
        return $this->hasMany(EntradaDetalhe::class,'entrada_id');
    }
}
