<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaidaDetalhe extends Model
{
    protected $table = 'saida_detalhe';

    protected $fillable = [
        'nome',
        'observacao',
        'valor_unitario',
        'quantidade',
        'valor_total',
        'saida_id',
        'tipo_unidade_id',
        'produto_id'
    ];

    public function saida()
    {
        return $this->belongsTo(Saida::class, 'id', 'saida_id');
    }
}
