@extends('layouts.app')

@section('title', 'login')

@section('content')
    <a class="button back" href="{{ route('index') }}">Volver</a>
    <form action="{{ route('LoginVerify') }}" method="POST">
        @csrf
        <h1>Ingresar</h1>
        <label for="">email</label>
        <input type="email" name="email" placeholder="ingrese su email">
        <label for="">contraseña</label>
        <input type="password" name="password" placeholder="ingrese su contraseña">

        <span>¿no te has registrado?</span><a href="{{ route('register') }}">Registrate</a>
        <input type="submit" value="iniciar sesión" class="button button-blue">
       
        @if ($errors->any())
        @foreach ( $errors->all() as $error)
        <p style="color: red;">{{ $error}}</p>
        @endforeach
            
        @endif

    </form>
@endsection
