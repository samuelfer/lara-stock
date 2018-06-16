<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Setor extends Model
{
    use HasRoles;

    protected $guard_name = 'web';

    protected $table = 'setor';

    protected $fillable = [
      'nome',
      'observacao'
    ];
}
