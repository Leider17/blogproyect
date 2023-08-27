
<div>

    <nav><a href="{{ route('index' )}}">
        <div class="logo">
            
        <img src="{{ asset('imagenes/logo.png') }}" alt="logo">
        <h1>vision360</h1>
        </div></a>
        <a href="{{ route('updateAutor') }}">
            <div class="autor-logo">
            @if ($autor->uri_perfil==null)
            
                <span >{{$autor->initials}}</span>
            
            @else
                <img src="{{ asset('storage/imagenesperfil/'.$autor->uri_perfil) }}"  width="100" height="100" alt="">
            @endif
            </div>
        </a>
    </nav>
    <div class="categories">