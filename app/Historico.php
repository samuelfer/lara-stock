<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    protected $table = 'historico';

    protected $fillable = [
      'data_historico',
      'data_entrada',
      'entrada_id',
      'entrada_detalhe_id',
      'saida_id',
      'saida_detalhe_id',
      'quantidade',
      'qtde_removida'
    ];
}
