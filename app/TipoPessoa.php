<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPessoa extends Model
{
    protected $table = 'tipo_pessoa';

    protected $fillable = [
        'nome'
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'tipo_pessoa_id', 'id');
    }
}
