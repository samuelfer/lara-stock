<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';

    protected $fillable = ['nome'];


    public function produto()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }
}
