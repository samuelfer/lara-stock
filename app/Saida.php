<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
    protected $table = 'saida';

    protected $fillable = [
        'data',
        'valor',
        'observacao',
        'setor_id'
    ];

    public function saida_detalhe()
    {
        return $this->hasMany(SaidaDetalhe::class, 'id', 'saida_id');
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class, 'id', 'setor_id');
    }
}
