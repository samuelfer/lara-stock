<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = 'pessoa';

    protected $fillable = [
        'nome',
        'cpf_cnpj',
        'nome_fantasia',
        'telefone',
        'fone_contato',
        'email',
        'dt_nascimento',
        'tipo_pessoa_id'
    ];

    public function tipo_pessoa()
    {
        return $this->hasOne(TipoPessoa::class, 'tipo_pessoa_id', 'id');
    }

}
