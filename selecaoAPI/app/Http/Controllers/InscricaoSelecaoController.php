<?php

namespace App\Http\Controllers;

use App\SelecoesCandidatos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Auth;
use Response;

class InscricaoSelecaoController extends Controller
{
  public function index()
  {
    $headers = ['Content-Type' => 'application/json; charset=UTF-8'];
    return response()->json(true, 200, $headers);
  }

  /** Retorna o formulário de inscrição em seleção e passa o id para dentro
   * @param $id - id da seleção
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function show($id)
  {
    $data = [
      'id' => $id
    ];

    return view('inscricaoSelecao', $data);
  }

  /** Salva a inscrição na seleção em banco
   * @param Request $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store(Request $request)
  {
    $inscricao = $request->all();
    $user = Auth::user();

    if ($this->validarFormulario($inscricao, $user)) {
      if (SelecoesCandidatos::where('candidato_id', '=', $user->id)->where('selecao_id', '=', $inscricao['inscricao'])->get()->count() == 0) {
        $array = ['selecao_id' => $inscricao['inscricao'], 'semestre_atual' => $inscricao['semestre'],
          'CH_cumprida' => $inscricao['CH'], 'CR_atual' => $inscricao['CR'], 'candidato_id' => $user->id];
        $create = SelecoesCandidatos::create($array);
        if ($create) {
          return Redirect::route('home');
        }
      } else {
        return Response::json('Voce nao pode se cadastrar duas vezes na mesma selecao!');
      }
    } else {
      return Response::json('Dados incorretos!');
    }
  }

  /** Valida o formulário
   * @param $data
   * @param $user
   * @return mixed
   */
  public function validarFormulario($data, $user)
  {
    return Validator::make($data, ['CR' => 'required|numeric',
      'CH' => 'required|numeric',
      'semestre' => 'required|integer']);
  }
}
