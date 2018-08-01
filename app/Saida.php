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
        'pessoa_id'
    ];

    public function saida_detalhe()
    {
        return $this->hasMany(SaidaDetalhe::class, 'saida_id');
    }

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id');
    }
}
