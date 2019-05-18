<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = DB::table('users')
                    ->leftJoin('informacoes_candidatos','users.id','=','informacoes_candidatos.usuario_id')
                    ->select(
                        'users.id',
                        'users.name',
                        'users.email',
                        'users.flag_candidato',
                        'informacoes_candidatos.nome_do_curso',
                        'informacoes_candidatos.numero_matricula',
                        'informacoes_candidatos.idade'
                    )
                    ->get();
        $headers = ['Content-Type' => 'application/json; charset=UTF-8'];
        return response()->json($users,200,$headers);
    }

    public function show($id) {
        $user = DB::table('users')
        ->where('users.id','=',$id)
        ->leftJoin('informacoes_candidatos','users.id','=','informacoes_candidatos.usuario_id')
        ->select(
            'users.id',
            'users.name',
            'users.email',
            'users.flag_candidato',
            'informacoes_candidatos.nome_do_curso',
            'informacoes_candidatos.numero_matricula',
            'informacoes_candidatos.idade'
        )
        ->get();
        if($user->count() == 0) {
            $data = [
                'mensagem' => 'Usuário não encontrado! Ta procurando errado brother?',
                'status' => '404'
            ];
            return response()->json($data, 404);
        }
        $headers = ['Content-Type' => 'application/json; charset=UTF-8'];
        return response()->json($user,200,$headers);
    }
}
