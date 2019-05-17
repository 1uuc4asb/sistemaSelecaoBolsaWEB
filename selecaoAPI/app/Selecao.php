<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Selecao extends Model
{
    protected $table = 'selecoes';

    protected $fillable = [
        'dono_da_selecao','nome','data_do_resultado','parametro_de_comparacao'
    ];

    protected $casts = [
        'data_do_resultado' => 'datetime'
    ];
}
