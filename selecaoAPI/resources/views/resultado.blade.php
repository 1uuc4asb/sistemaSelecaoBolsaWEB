@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ url('/home') }}">Home</a>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(!$selecao->isFinished($selecao->id))
                            <h3>Resultado parcial da seleção {{$selecao->nome}}</h3>
                        @else
                            <h3>Resultado final da seleção {{$selecao->nome}}</h3>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">
                                    Nome do candidato
                                </th>
                                <th scope="col">
                                    Semestre atual
                                </th>
                                <th scope="col">
                                    {{$selecao->parametro_de_comparacao}}
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($inscricoes as $inscricao)
                                <tr>
                                    <td>
                                        {{$inscricao->name}}
                                    </td>
                                    <td>
                                        {{$inscricao->semestre_atual}}
                                    </td>
                                    <td>
                                        @if($selecao->parametro_de_comparacao == 'CH')
                                            {{$inscricao->CH_cumprida}}
                                        @elseif($selecao->parametro_de_comparacao == 'CR')
                                            {{$inscricao->CR_atual}}
                                        @elseif($selecao->parametro_de_comparacao == 'SEMESTRE')
                                            {{$inscricao->semestre_atual}}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
