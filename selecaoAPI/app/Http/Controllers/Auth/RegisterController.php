<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\InformacoesCandidatos;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if(!isset($data['flag_candidato'])) {
            $data['flag_candidato'] = false;
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'flag_candidato' => ['required']
            ],[
                'required' => 'Este campo é obrigatório.',
                'email' => 'O campo deve ser preenchido com um e-mail.',
                'email.unique' => 'Este e-mail já foi cadastrado.',
                'max' => 'Este campo deve ser menor que :max',
                'password.min' => 'A senha deve ter pelo menos :min caracteres'
            ]);
        }
        
        $data['flag_candidato'] = true;
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'n_matricula' => ['required', 'integer','unique:informacoes_candidatos,numero_matricula'],
            'nome_do_curso' => ['required', 'string', 'max:255'],
            'idade' => ['required', 'integer', 'max:150'],
            'flag_candidato' => ['required']
        ],[
            'required' => 'Este campo é obrigatório.',
            'email' => 'O campo deve ser preenchido com um e-mail.',
            'email.unique' => 'Este e-mail já foi cadastrado.',
            'max' => 'Este campo deve ser menor que :max',
            'password.min' => 'A senha deve ter pelo menos :min caracteres',
            'idade.max' => 'Mais de 150 anos? Desculpe, não aceitamos bruxos aqui... DEUS VULT',
            'n_matricula.unique' => 'Este número de matrícula já foi cadastrado.',
            'integer' => 'O campo deve ser preenchido com um número inteiro'
        ]);
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(!isset($data['flag_candidato'])) {
            $data['flag_candidato'] = false;
        }
        else {
            $data['flag_candidato'] = true;
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'flag_candidato' => $data['flag_candidato']
        ]);

        if($data['flag_candidato'] == false) {
            return $user;
        }
        try {
            InformacoesCandidatos::create([
                'usuario_id' => User::where('email','=',$data['email'])->first()->id,
                'nome_do_curso' => $data['nome_do_curso'],
                'numero_matricula' => $data['n_matricula'],
                'idade' => $data['idade']
            ]);
        }
        catch (Exception $e) {
            User::where('email','=',$data['email'])->first()->delete();
            throw $e;
        }

        return $user;
    }
}
