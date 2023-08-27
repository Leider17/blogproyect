
    
    @foreach($categories as $category)
    <h2>{{$category->nombre}}</h2>
        @foreach ($category->article as $article)
        <div class="article">
            <img class="portada" src="{{ asset('storage/imagenesportada/'.$article->uri_portada) }}" alt="imagen portada">
            <div class="article_information">
           <a href="{{ route('show', $article->id) }}">{{$article->titulo}}</a>
           <p>{{$article->descripcion}}</p>
        </div>
        </div>
        @endforeach

    @endforeach

