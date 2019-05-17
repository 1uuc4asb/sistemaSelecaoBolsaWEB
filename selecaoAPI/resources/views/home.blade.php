@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Seleções </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Exatamente aqui as seleções com a tabela front end. Boa sorte! <br/>
                    Criem e coloquem scripts na pasta /public/js. <br/>
                    Criem e coloquem estilos na pasta /public/css. <br/>
                    Importem os dois aqui mesmo (Me refiro dentro da view) com tags html &lt;link/&gt; e &lt;script/&gt; . <br/>
                    <a href="https://laravel.com/docs/5.8/blade"> Podem usar blade a vontade! </a> <br/>
                    Qualquer coisa pergunta no grupo. Ainda vamos fazer a API e as actions.

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Seleção</th>
                            <th scope="col">Número de participantes</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td> Nome da seleção </td>
                                <td> 20 </td>
                                <td style="text-align: right;"> <button class="btn btn-primary"> Increver-se </button> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
