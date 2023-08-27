<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormularioArticulo extends Component
{
    public $titulo="";
    public $contenido="";
    public $category_id=0;

    public function store(){
        
        $autor=Auth::user();
        Article::create([
            'titulo'=>$this->titulo,
            'contenido'=>$this->contenido,
            'category_id'=>$this->category_id,
            'autor_id'=>$autor->id
        ]);
    }

    public function render()
    {
        return view('livewire.formulario-articulo');
    }
}
