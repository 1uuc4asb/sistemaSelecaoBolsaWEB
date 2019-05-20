<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelecoesCandidatos extends Model
{
    protected $table = 'selecoes_candidatos';

    protected $primaryKey = ['selecao_id','candidato_id'];

    protected $fillable = [
        'selecao_id','candidato_id','CR_atual','CH_cumprida','semestre_atual'
    ];


}
