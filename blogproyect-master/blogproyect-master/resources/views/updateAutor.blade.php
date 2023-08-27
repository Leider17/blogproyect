@extends('layouts.app')

@section('title', 'updateBlog')
@section('content')
    <h2>configuración de usuario</h2>
    <a class="button" href="{{ route('articleList') }}">volver</a>
    <form action="{{ route('updateEmail') }}" method="POST">
        @csrf
        @method('PUT')
        <legend>actualizar correo electronico</legend>
        <label for="">escriba su actual correo electronico</label>
        <input type="email" name="emailActual">

        <label for="">Nuevo correo electronico</label>
        <input type="email" name="email">
        <label for="">confirme su nuevo correo electronico</label>
        <input type="email" name="emailConfirmado">
        <input type="submit" class="button button-blue" value="actualizar correo electronico">
    </form>
    <form action="{{ route('updatePassword') }}" method="POST">
        <legend>actualizar contraseña</legend>
        @method('PUT')
        @csrf
        <label for="">escriba su actual contraseña</label>
        <input type="password" name="passwordActual">
        <label for="">Nueva contraseña</label>
        <input type="password" name="password">
        <label for="">confirme su nueva contraseña</label>
        <input type="password" name="passwordConfirmed">
        <input type="submit" class=" button button-blue"value="actualizar contraseña">
    </form>
    <form action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data">
        <legend>imagen perfil</legend>
        <div class="autor-logo">
            
            @if ($autor->uri_perfil == null)
                <span>{{ $autor->initials }}</span>
            @else
                <img src="{{ asset('storage/imagenesperfil/' . $autor->uri_perfil) }}" width="100" height="100"
                    alt="">
            @endif
        </div>
        <input type="file" name="file">
        @csrf
        
        <input type="submit" class="button button-blue" value="cambiar imagen">
    </form>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="button button-red">cerrar sesión</button>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
