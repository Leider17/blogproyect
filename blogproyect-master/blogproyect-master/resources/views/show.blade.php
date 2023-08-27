@extends('layouts.app')

@section('title','blog')

@section('content')
<h1>{{$article->titulo}}</h1>

<div>{!!$article->contenido!!}</div>

<div class="name">
    

    <div class="autor-logo">
    @if ($autor->uri_perfil==null)
    <span>{{$autor->initials}}</span>
    @else
        <img src="{{ asset('storage/imagenesperfil/'.$autor->uri_perfil) }}" width="100" height="100" alt="">
    @endif
    </div>
    <span>{{$autor->nombre}}</span>
    
    
</div>
@endsection
