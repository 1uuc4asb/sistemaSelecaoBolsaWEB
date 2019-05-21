@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ url('/home') }}">Home</a>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="row">
                        <div class="col-md-6">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <form name="formSelecaoBolsa" class="form-horizontal" method="post" action="{{\Illuminate\Support\Facades\URL::action('SelecoesController@create')}}">
                            @csrf
                            <input type="hidden" name="dono_da_selecao" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                            <div class="form-group">
                                <label for="nome">Nome da seleção</label>
                                <input type="text" class="form-control" name="nome" placeholder="Nome Seleção" value="{{old('nome')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Data de encerramento</label>
                                <input type='date' class="form-control" name="data_do_resultado" value="{{old('data_do_resultado')}}" required>
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Critério</label>
                                        <div class="radio">
                                            <label class="radio-inline">
                                                <input type="radio" name="parametro_de_comparacao" value="CR" @if(old('parametro_de_comparacao')) checked @endif> CH - Carga Horária
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="parametro_de_comparacao" value="CH" @if(old('parametro_de_comparacao')) checked @endif> CR - Coeficiente de Rendimento
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="parametro_de_comparacao" value="SEMESTRE" @if(old('parametro_de_comparacao')) checked @endif> Semestre Atual
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <input type="submit" class="btn btn-primary" value="Enviar">&nbsp;&nbsp;
                            <input type="reset" class="btn btn-primary" value="Limpar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>
