<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SelecoesController;
use App\Selecao;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //dd(Selecao::all());
        return view('home',[
            'selecoes_usuario' => Selecao::where('dono_da_selecao', '!=', Auth::id())->get(),
            'selecoes_criadas' => Selecao::where('dono_da_selecao', Auth::id())->get()
        ]);
    }
}
