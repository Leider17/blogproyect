@extends('layouts.app')

@section('title', 'register')

@section('content')
    <a  class="button back" href="{{ route('index') }}">Volver</a>
    <form action="{{ route('RegisterVerify') }}" method="POST">
        @csrf
        <h1>registro</h1>
        <label for="">Nombre</label>
        <input type="text" name="nombre" placeholder="ingrese su nombre">
        <label for="">correo electronico</label>
        <input type="email" name="email" placeholder="ingrese  su cuenta de correo electronico">

        <label for="">contraseña</label>
        <input type="password" name="password" placeholder="ingrese una contraseña">
        <label for="">confirmar contraseña</label>
        <input type="password" name="password-confirmed" placeholder="confirme su contraseña">
        <span>¿ya estas registadro?</span><a href="{{ route('login') }}">Ingresa</a>

        <input type="submit" value="registrarse" class="button button-blue">
        @if ($errors->any())
        @foreach ( $errors->all() as $error)
        <p style="color: red;">{{ $error}}</p>
        @endforeach
            
        @endif
    </form>
@endsection
