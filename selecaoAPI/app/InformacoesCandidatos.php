<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformacoesCandidatos extends Model
{
    protected $table = 'informacoes_candidatos';

    protected $primaryKey = 'usuario_id';

    protected $fillable = [
        'usuario_id','nome_do_curso','numero_matricula','idade'
    ];
}
