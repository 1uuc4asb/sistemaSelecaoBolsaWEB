@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
		    <div class="card">
                <div class="card-header"> Minhas Seleções </div>

                <div class="card-body">
				
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					Aqui a listagem das seleções do usuário (dono da seleção) logado. <br/><br/>
					<a class="btn btn-primary" href=""> Criar Seleção </a> <br/> <br/>
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
                            <!-- 
                                Usar for do blade para iterar selecoes e mostrar dados de cada selecao! 
                                lembre-se de alterar o segundo parametro do href também!
                            -->
                            <tr>
                                <th scope="row">  </th>
                                <td>  </td>
                                <td>  </td>
                                <td> <a class="btn btn-primary" href=""> Processar </a> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <div class="card">
                <div class="card-header"> Todas as Seleções </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Aqui a listagem de todas as seleções. <br/> <br/>
                 
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
                            <!-- 
                                Usar for do blade para iterar selecoes e mostrar dados de cada selecao! 
                                lembre-se de alterar o segundo parametro do href também!
                            -->
                            <tr>
                                <th scope="row"> {{ $selecoes[0]->id }} </th>
                                <td> {{ $selecoes[0]->nome }} </td>
                                <td> bla </td>
                                <td> <a class="btn btn-primary" href="{{ route('inscricaoSelecaoShow',$selecoes[0]->id) }}"> Inscrever-se </a> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
