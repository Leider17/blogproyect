@extends('layouts.app')
@section('title', 'EditBlog')

@section('content')
    <h2>edición de los articulos</h2>
    <a class="button" href="{{ route('articleList') }}">volver</a>
    <form action="{{ route('articleUpdate', $article->id) }}" method="POST" class="crud" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <label for="">titulo</label>
        <input type="text" name="titulo" value="{{ $article->titulo }}">
        <label for="">breve descripción</label>
        <textarea name='descripcion'>{{$article->descripcion}}</textarea>
        <label for="">contenido</label>
        <div class="editor-container">
            <textarea name="contenido" id="content">{{ $article->contenido }} </textarea>
        </div>
        <label for="">imagen de portada</label>
        <img class="portada" src="{{ asset('storage/imagenesportada/'.$article->uri_portada) }}" alt="imagen portada">
        <input type="file" name="file">
        <legend>categorias</legend>
        <div class="categories">
            <div class="category">
                <label for="">tecnologia</label>
                <input type="radio" value="1" name="category_id" {{ $article->category_id == 1 ? 'checked' : '' }}>
            </div>
            <div class="category">
                <label for="">actualidad</label>
                <input type="radio" value="2" name="category_id" {{ $article->category_id == 2 ? 'checked' : '' }}>
            </div>
            <div class="category">
                <label for="">ambiente</label>
                <input type="radio" value="3" name="category_id" {{ $article->category_id == 3 ? 'checked' : '' }}>
            </div>
        </div>
        <input type="submit" value="editar" class="button">
    </form>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
