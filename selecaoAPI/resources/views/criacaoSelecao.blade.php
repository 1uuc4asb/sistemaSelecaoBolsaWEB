@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{ $mensagem }}
        <form>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nome Seleção">
            </div>
            <div class="container">
                <div class="row">
                    <div class='col-sm-6'>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(function () {
                            $('#datetimepicker1').datetimepicker();
                        });
                    </script>
                </div>
            </div>
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1">
                        <label class="form-check-label" for="gridRadios1">
                            CH - Carga Horária
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                        <label class="form-check-label" for="gridRadios2">
                            CR - Coeficiente de Rendimento
                        </label>
                        </div>
                        <div class="form-check disabled">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
                        <label class="form-check-label" for="gridRadios3">
                            Semestre Atual
                        </label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <input type="button" class="btn btn-primary" value="Enviar" onclick="validaform(this.form)>
            <input type="reset" class="btn btn-primary" value="Limpar">
        </form>
        <script type="text/javascript">
		    function validaform(form){
            form.submit();
            }
        </script>
    </div>
</div>
@endsection
