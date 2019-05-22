@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="row justify-content-center">
            
            <form name="formInscricaoSelecao" method="POST" action="{{ url('inscricaoSelecao') }}">
                @csrf
                <div class="form-group">
                    <div class="row justify-content-center">
                        <input type="number" step=".01" name="CH" id="CH" class="form-control"
                               placeholder="Carga horária cumprida" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row justify-content-center">
                        <input type="number" step=".01" name="CR" id="CR" class="form-control"
                               placeholder="Coeficiente de rendimento" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row justify-content-center">
                        <input type="number" name="semestre" id="semestre" class="form-control"
                               placeholder="Semestre Atual" required>
                    </div>
                </div>
                <input type="hidden" name="inscricao" value="{{$id}}">
                <div class="row justify-content-center">
                    <input type="submit" class="btn btn-primary" value="Enviar">&nbsp;&nbsp;
                    <input type="reset" class="btn btn-primary" value="Limpar">
                </div>
            </form>
           
        </div>
    </div>
@endsection
