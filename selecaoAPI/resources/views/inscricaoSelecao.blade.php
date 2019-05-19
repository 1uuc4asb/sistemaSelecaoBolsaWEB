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
        <form>
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
                <button type="submit" class="btn btn-primary" style="align-content: center;">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection