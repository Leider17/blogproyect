@extends('layouts.app')
@section('title', 'createBlog')

@section('content')
    <div>
        <h2>creación de articulos</h2>
        <a class="button" href="{{ route('articleList') }}">volver</a>
        <form method="POST" action="{{ route('articleStore') }}" enctype="multipart/form-data" class="crud">
            @csrf
            <label for="">titulo</label>
            <input type="text" name='titulo'>
            <label for="">breve descripción</label>
            <textarea name='descripcion' ></textarea>
            <label for="">contenido</label>
            <div class="editor-container">
            <textarea name='contenido'  class="contenido" id="content"></textarea>
        </div>
            <label for="">imagen de portada</label>
            <input type="file" name="file">
            <legend>categorias</legend>
            <div class="categories">
                <div class="category">
                    <label for="">tecnologia</label>

                    <input type="radio" name="category_id" value="1" name='category_id'>
                </div>
                <div class="category">
                    <label for="">actualidad</label>
                    <input type="radio" name="category_id" value="2" name='category_id'>
                </div>
                <div class="category">
                    <label for="">ambiente</label>
                    <input type="radio" name="category_id" value="3" name='category_id'>
                </div>
            </div>
            <button class="button" type="submit">crear</button>
        </form>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
           
    </script>
@endsection
