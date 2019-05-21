@extends('layouts.app')

@section('content')
    @if(!$selecao->isFinished($selecao->id))
        <h1>Resultado parcial da seleção {{$selecao->nome}}</h1>
    @else
        <h1>Resultado final da seleção {{$selecao->nome}}</h1>
    @endif
    <table>
        <thead>
        <tr>
            <th>
                Nome
            </th>

            <th>
                Semestre
            </th>
            <th>
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
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
