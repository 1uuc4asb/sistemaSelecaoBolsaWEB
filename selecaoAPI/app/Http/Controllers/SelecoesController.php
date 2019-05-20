<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Selecao;
use Illuminate\Validation\Rule;
use Datetime;

class SelecoesController extends Controller
{
    public function index () {
        $selecoes = DB::table('selecoes')
                        ->select(
                            'selecoes.id',
                            'selecoes.dono_da_selecao',
                            'selecoes.nome',
                            'selecoes.data_do_resultado',
                            'selecoes.parametro_de_comparacao'
                        )
                        ->get();
        $headers = ['Content-Type' => 'application/json; charset=UTF-8'];
        return response()->json($selecoes, 200, $headers);
    }

    public function returnDataToTable() {
        while($linha != null)
            echo '<tr>';
                echo '<td>'. $selecoes= DB::table('selecoes')
                ->select('selecoes.id').'</td>';
                echo '<td>'. $selecoes= DB::table('selecoes')
                ->select('selecoes.nome').'</td>';
                /*echo '<td>'. $selecoes= DB::table('selecoes')
                *->select('selecoes.id').'</td>';
                * Inserir na tabela quantidade de usuários cadastrados na seleção para retorno na tela home.
                */
            echo '</tr>'; 
    }
    public function show($id) {
        $selecao = DB::table('selecoes')
                        ->where('selecoes.id','=',$id)
                        ->select(
                            'selecoes.id',
                            'selecoes.dono_da_selecao',
                            'selecoes.nome',
                            'selecoes.data_do_resultado',
                            'selecoes.parametro_de_comparacao'
                        )
                        ->get();
        $headers = ['Content-Type' => 'application/json; charset=UTF-8'];
        if($selecao->count() == 0) {
            $data = [
                'mensagem' => 'Seleção não encontrada! Ta procurando errado brother?'
            ];
            return response()->json($data, 404,$headers);
        }
        //TODO Se a seleção acabou, resolver vencedor e dar resposta =D
        
        return response()->json($selecao,200,$headers);
    }

    public function store(Request $request) {
        $headers = ['Content-Type' => 'application/json; charset=UTF-8'];
        $validator = Validator::make($request->all(), [
            'dono_da_selecao' => ['required','exists:users,id'],
            'nome' => ['required'],
            'data_do_resultado' => ['required','date'],
            'parametro_de_comparacao' => ['required', Rule::in(['CH', 'CR','SEMESTRE','ALFABETICA_NOME','ALFABETICA_CURSO','IDADE']),]
        ],
        [
            'required' => 'O atributo :attribute é obrigatório',
            'dono_da_selecao.exists' => 'O ID passado não pertence a nenhum usuário.',
            'date' => 'O atributo :attribute deve ser do tipo data. Ou escrito no formato "dia-mes-ano horas:minutos:segundos"',
            'parametro_de_comparacao.in' => "O parametro de comparação deve ser um desses: ['CH', 'CR','SEMESTRE','ALFABETICA_NOME','ALFABETICA_CURSO','IDADE'] "
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors(), 200, $headers);
        }

        try {
            $selecao = Selecao::create(
                array(
                    'dono_da_selecao' => $request->input('dono_da_selecao'),
                    'nome' => $request->input('nome'),
                    'data_do_resultado' => new Datetime($request->input('data_do_resultado')),
                    'parametro_de_comparacao' => $request->input('parametro_de_comparacao')
                )
            );
            $data = [
                'mensagem' => 'A selecao foi criada com sucesso!'
            ];
            return response()->json($data, 200, $headers);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'dono_da_selecao' => ['required','exists:users,id'],
            'nome' => ['required'],
            'data_do_resultado' => ['required','date', 'date_format:Y-m-d H:i:s'],
            'parametro_de_comparacao' => ['required', Rule::in(['CH', 'CR','SEMESTRE','ALFABETICA_NOME','ALFABETICA_CURSO','IDADE']),]
        ],
            [
                'required' => 'O atributo :attribute é obrigatório',
                'dono_da_selecao.exists' => 'O ID passado não pertence a nenhum usuário.',
                'date' => 'O atributo :attribute deve ser do tipo data. Ou escrito no formato "dia-mes-ano horas:minutos:segundos"',
                'parametro_de_comparacao.in' => "O parametro de comparação deve ser um desses: ['CH', 'CR','SEMESTRE','ALFABETICA_NOME','ALFABETICA_CURSO','IDADE'] "
            ]);
        if($validator->fails()) {
            return redirect()->action('SelecoesController@renderform')
                ->withErrors($validator)
                ->withInput();
        }else{
            $selecao = new Selecao();
            $selecao->fill($request->all());
            $selecao->save();

            return redirect()->action('HomeController@index');
        }
    }

    public function renderform(){
        $selecao = new Selecao(['dono_da_selecao' => Auth::id()]);

        return view('criacaoSelecao', [
            'selecao' => $selecao
        ]);
    }
}
