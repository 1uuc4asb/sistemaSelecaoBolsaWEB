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
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($selecoes_criadas as $index => $selecao)
                                <tr>
                                    <th scope="row"> {{ $index+1 }} </th>
                                    <td> {{ $selecao->nome }} </td>
                                    <td> {{$selecao->getEntradas()}}</td>
                                    <td> {{ \Carbon\Carbon::parse($selecao->data_do_resultado)->format('d/m/Y')}}</td>
                                    <td>
                                        @if(!$selecao->isFinished($selecao->id))
                                            <a class="btn btn-warning"
                                               href="{{\Illuminate\Support\Facades\URL::action('SelecoesController@mostraresultado', ['id' => $selecao->id])}}">
                                                Resultado parcial </a>
                                        @else
                                            <a class="btn btn-success"
                                               href="{{\Illuminate\Support\Facades\URL::action('SelecoesController@mostraresultado', ['id' => $selecao->id])}}">
                                                Resultado final </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card">
                        <div class="card-header"> Outras Seleções</div>
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
                                @foreach($selecoes_usuario as $index => $selecao)
                                    <tr>
                                        <th scope="row"> {{ $index+1 }} </th>
                                        <td> {{ $selecao->nome }} </td>
                                        <td> {{$selecao->getEntradas()}}</td>
                                        <td> {{ \Carbon\Carbon::parse($selecao->data_do_resultado)->format('d/m/Y')}}</td>
                                        <td>
                                            @if(Auth::user()->flag_candidato)
												@if(App\SelecoesCandidatos::where('selecao_id', $selecao->id)->where('candidato_id', \Illuminate\Support\Facades\Auth::id())->count() == 0 && !$selecao->isFinished($selecao->id))
													<a class="btn btn-primary" href="{{ route('inscricaoSelecaoShow',$selecao->id) }}">Inscrever-se </a>
												@elseif($selecao->isFinished($selecao->id))
                                                <a class="btn btn-danger"
                                                   href="{{\Illuminate\Support\Facades\URL::action('SelecoesController@mostraresultado', ['id' => $selecao->id])}}">
                                                    Resultado </a>
												@else
													<span style="padding: 6px; background-color: #2fa360; color: white; border-radius: 5px;">Inscrito</span>
												@endif
											@elseif($selecao->isFinished($selecao->id))
                                                <a class="btn btn-danger"
                                                   href="{{\Illuminate\Support\Facades\URL::action('SelecoesController@mostraresultado', ['id' => $selecao->id])}}">
                                                    Resultado </a>
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
