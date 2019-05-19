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
    <!--o lavavel não tá configurado pra suportar post. como os formulários serão enviados???-->
        <form  name="formInscricaoSelecao" method="post" action=" ">
            <div class="form-group">
                <div class="row justify-content-center">
                    <input type="number" name="CH" id="CH" class="form-control" placeholder="Carga horária cumprida">
                </div>
            </div>
            <div class="form-group">
                <div class="row justify-content-center">
                    <input type="number" name="CR" id="CR" class="form-control" placeholder="Coeficiente de rendimento">
                </div>
            </div>
            <div class="form-group">
                <div class="row justify-content-center">
                    <input type="number" name="semestre" id="semestre" class="form-control" placeholder="Semestre Atual">
                </div>
            </div>
            <div class="row justify-content-center">
                  <input type="button" class="btn btn-primary" value="Enviar" onclick="validaform(this.form)">&nbsp;&nbsp;
                  <input type="reset" class="btn btn-primary" value="Limpar">
            </div>
        </form>
        <!-- validação básica do formulário -->
        <script type="text/javascript">
		    function validaform(form){
				var CH = document.getElementById("CH");
				var CR = document.getElementById("CR");
				var semestre = document.getElementById("semestre");
				
				if(teste(CH,"Carga horária cumprida")==false)return false;
				if(teste(CR,"Coeficiente de rendimento")==false)return false;
				if(teste(semestre,"Semestre atual")==false)return false;
				
            form.submit();
            }
			function teste(campo,texto){
				if (campo.value==""){
					alerta(texto);
					campo.focus();
					return false;
				}
				return true;
			}
			function alerta(texto){
				alert ("Campo "+texto+" é obrigatório.");
			}
        </script>
    </div>
</div>
@endsection
