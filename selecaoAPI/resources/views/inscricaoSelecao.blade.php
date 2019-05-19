@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{ $mensagem }}
        <form>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="CH - Carga horária cumprida">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="CR - Coeficiente de rendimento">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Semestre Atual">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection