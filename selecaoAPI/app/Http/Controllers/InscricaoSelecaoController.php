<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InscricaoSelecaoController extends Controller
{
    public function index() {
        $data = [
            'mensagem' => 'Para inscrever um candidato em uma seleção você deve informar qual né gênio... Passa o ID da seleção depois do api/inscricaoSelecao.'
        ];
        $headers = ['Content-Type' => 'application/json; charset=UTF-8'];
        return response()->json($data, 200, $headers);
    }

    public function show($id) {
        /* 
            TODO
                Pegar dados da seleção com id = $id. Colocar no data pra passar pra view.
        */
        $data = [
            'mensagem' => 'Em desenvolvimento ;)'
        ];
        return view('inscricaoSelecao', $data);
    }

    public function store($data) {
        /*
            TODO
                Verificar dados do formulário passado pelo front e guardar dados no banco.
                Tabela selecoescandidatos =D
        */
        if(validarFormulario()) {
            /*
                Verificar se formulario foi validado ou não. https://laravel.com/docs/5.8/validation
            */
        }
    }

    public function validarFormulario($data) {
        /*
            TODO
                Fazer validação dos campos passados pelo post no método acima.
        */
        return Validator::make($data,[]);
    }
}
