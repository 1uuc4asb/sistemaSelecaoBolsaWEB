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
                    <input type="text" class="form-control" placeholder="Carga horária cumprida">
                </div>
            </div>
            <div class="form-group">
                <div class="row justify-content-center">
                    <input type="text" class="form-control" placeholder="Coeficiente de rendimento">
                </div>
            </div>
            <div class="form-group">
                <div class="row justify-content-center">
                    <input type="text" class="form-control" placeholder="Semestre Atual">
                </div>
            </div>
            <div class="row justify-content-center">
                  <input type="button" class="btn btn-primary" value="Enviar" onclick="validaform(this.form)">&nbsp;&nbsp;
                  <input type="reset" class="btn btn-primary" value="Limpar">
            </div>
        </form>
        <script type="text/javascript">
		    function validaform(form){
            form.submit();
            }
        </script>
    </div>
</div>
@endsection
