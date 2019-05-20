@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> Minhas Seleções</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        Aqui a listagem das seleções do usuário (dono da seleção) logado. <br/><br/>
                        <a class="btn btn-primary"
                           href="{{\Illuminate\Support\Facades\URL::action('SelecoesController@renderform')}}"> Criar
                            Seleção </a> <br/> <br/>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Seleção</th>
                                <th scope="col">Número de participantes</th>
                                <th scope="col">Data de encerramento</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($selecoes_criadas as $selecao)
                                <tr>
                                    <th scope="row"> {{ $selecao->id }} </th>
                                    <td> {{ $selecao->nome }} </td>
                                    <td> {{$selecao->getEntradas()}}</td>
                                    <td> {{ \Carbon\Carbon::parse($selecao->data_do_resultado)->format('d/m/Y')}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card">
                        <div class="card-header"> Todas as Seleções</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Seleção</th>
                                    <th scope="col">Número de participantes</th>
                                    <th scope="col">Data de encerramento</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($selecoes_usuario as $selecao)
                                    <tr>
                                        <th scope="row"> {{ $selecao->id }} </th>
                                        <td> {{ $selecao->nome }} </td>
                                        <td> {{$selecao->getEntradas()}}</td>
                                        <td> {{ \Carbon\Carbon::parse($selecao->data_do_resultado)->format('d/m/Y')}}</td>
                                        <td>
                                            @if(App\SelecoesCandidatos::where('selecao_id', $selecao->id)->where('candidato_id', \Illuminate\Support\Facades\Auth::id())->count() == 0)
                                                <a class="btn btn-primary"
                                                   href="{{ route('inscricaoSelecaoShow',$selecao->id) }}">
                                                    Inscrever-se </a>
                                            @else
                                                <span style="padding: 6px; background-color: #2fa360; color: white; border-radius: 5px;">Inscrito</span>
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
        </div>
@endsection
