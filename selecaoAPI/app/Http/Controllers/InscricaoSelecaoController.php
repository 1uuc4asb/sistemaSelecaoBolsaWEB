<?php

namespace App\Http\Controllers;

use App\SelecoesCandidatos;
use Illuminate\Http\Request;
use Validator;
use Auth;

class InscricaoSelecaoController extends Controller
{
  public function index()
  {
    $data = [
      'mensagem' => 'Para inscrever um candidato em uma seleção você deve informar qual né gênio... Passa o ID da seleção depois do api/inscricaoSelecao.'
    ];

    $headers = ['Content-Type' => 'application/json; charset=UTF-8'];
    return response()->json($data, 200, $headers);
  }

  public function show($id)
  {
    /*
        TODO
            Pegar dados da seleção com id = $id. Colocar no data pra passar pra view.
    */
    $data = [
      'id' => $id
    ];

    return view('inscricaoSelecao', $data);
  }

  public function store(Request $request)
  {
    $inscricao = $request->all();
    $user = Auth::user();
    $array = ['selecao_id' => $inscricao['inscricao'], 'semestre_atual' => $inscricao['semestre'],
      'CH_cumprida' => $inscricao['CH'], 'CR_atual' => $inscricao['CR'], 'candidato_id' => $user->id];
    SelecoesCandidatos::create($array);
  }

  public function validarFormulario($data)
  {
    /*
        TODO
            Fazer validação dos campos passados pelo post no método acima.
    */
    return Validator::make($data, ['CR' => 'required|numeric',
      'CH' => 'required|numeric',
      'semestre' => 'required|integer']);
  }
}
