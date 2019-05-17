@extends('layouts.app')

@section('content')
<script src="{{ asset('js/register.js') }}" defer></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Cadastre-se </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"> Nome </label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"> E-mail </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"> Senha </label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"> Confirme sua senha </label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="flag_candidato" class="col-md-4 col-form-label text-md-right"> Você é um candidato? </label>

                            <div class="col-md-1">
                            @if (!old('flag_candidato') || old('flag_candidato') == false)
                                <input id="flag_candidato" type="checkbox" style="vertical-align: bottom;" class="@error('flag_candidato') is-invalid @enderror" name="flag_candidato" value="{{ old('flag_candidato') }}">
                            @else
                                <input id="flag_candidato" checked type="checkbox" style="vertical-align: bottom;" class="@error('flag_candidato') is-invalid @enderror" name="flag_candidato" value="{{ old('flag_candidato') }}">
                            @endif
                                @error('flag_candidato')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    

                        @if (!old('flag_candidato') || old('flag_candidato') == false)
                            <div id="n_matricula_container" class="form-group row d-none">
                                <label for="n_matricula" class="col-md-4 col-form-label text-md-right"> Número de matrícula </label>

                                <div class="col-md-6">
                                    <input id="n_matricula" type="number" class="form-control @error('n_matricula') is-invalid @enderror" name="n_matricula" value="{{ old('n_matricula') }}">

                                    @error('n_matricula')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="nome_do_curso_container" class="form-group row d-none">
                                <label for="nome_do_curso" class="col-md-4 col-form-label text-md-right"> Nome do curso </label>

                                <div class="col-md-6">
                                    <input id="nome_do_curso" type="text" class="form-control @error('nome_do_curso') is-invalid @enderror" name="nome_do_curso" value="{{ old('nome_do_curso') }}">

                                    @error('nome_do_curso')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="idade_container" class="form-group row d-none">
                                <label for="idade" class="col-md-4 col-form-label text-md-right"> Idade </label>

                                <div class="col-md-6">
                                    <input id="idade" type="number" class="form-control @error('idade') is-invalid @enderror" name="idade" value="{{ old('idade') }}">

                                    @error('idade')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @else
                            <div id="n_matricula_container" class="form-group row">
                                <label for="n_matricula" class="col-md-4 col-form-label text-md-right"> Número de matrícula </label>

                                <div class="col-md-6">
                                    <input id="n_matricula" type="number" class="form-control @error('n_matricula') is-invalid @enderror" name="n_matricula" value="{{ old('n_matricula') }}">

                                    @error('n_matricula')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="nome_do_curso_container" class="form-group row">
                                <label for="nome_do_curso" class="col-md-4 col-form-label text-md-right"> Nome do curso </label>

                                <div class="col-md-6">
                                    <input id="nome_do_curso" type="text" class="form-control @error('nome_do_curso') is-invalid @enderror" name="nome_do_curso" value="{{ old('nome_do_curso') }}">

                                    @error('nome_do_curso')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="idade_container" class="form-group row">
                                <label for="idade" class="col-md-4 col-form-label text-md-right"> Idade </label>

                                <div class="col-md-6">
                                    <input id="idade" type="number" class="form-control @error('idade') is-invalid @enderror" name="idade" value="{{ old('idade') }}">

                                    @error('idade')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @endif

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
