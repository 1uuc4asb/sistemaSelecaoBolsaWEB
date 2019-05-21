<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Selecao extends Model
{
    protected $table = 'selecoes';

    protected $fillable = [
        'dono_da_selecao', 'nome', 'data_do_resultado', 'parametro_de_comparacao'
    ];

    protected $casts = [
        'data_do_resultado' => 'datetime'
    ];

    public function getEntradas()
    {
        return SelecoesCandidatos::where('selecao_id', $this->id)->count();
    }

    /** Verifica se já passou da data do resultado da seleção
     * @return bool
     */
    public function isFinished($id)
    {
        return Carbon::parse(Selecao::where('id', '=', $id)->select('data_do_resultado')->first()->data_do_resultado)->lessThanOrEqualTo(Carbon::today());
    }
}
