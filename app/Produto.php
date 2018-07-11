<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    protected $fillable = [
    	'nome',
    	'estoque',
        'descricao',
        'peso',
        'volume',
        'tipo_unidade_id',
        'categoria_id',
        'fornecedor_id'
    ];

    public function tipo_unidade()
    {
        return $this->hasOne(TipoUnidade::class, 'tipo_unidade_id', 'id');
    }

    public function categoria()
    {
        return $this->hasOne(Categoria::class, 'categoria_id', 'id');
    }
}
