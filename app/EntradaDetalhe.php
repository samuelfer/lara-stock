<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntradaDetalhe extends Model
{
    protected $table = 'entrada_detalhe';

    protected $fillable = [
        'valor_unitario',
        'valor_total',
        'quantidade',
        'entrada_id',
        'tipo_unidade_id',
        'fornecedor_id',
        'produto_id'
    ];

    public function entrada()
    {
        return $this->belongsTo(Entrada::class, 'id', 'entrada_id');
    }

    public function tipo_unidade()
    {
        return $this->belongsTo(TipoUnidade::class, 'id', 'tipo_unidade_id');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'id', 'produto_id');
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'id', 'fornecedor_id');
    }

}
