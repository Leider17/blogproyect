<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autor=Auth::user();
        $articles=$autor->articles;

        return view('articleList', compact('articles','autor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articleCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $autor=Auth::user();
        $file=$request->file;
        $file_name=time().".".$file->extension();
        $file->storeAs('public/imagenesportada',$file_name);
        Article::create([
            'titulo'=>$request->titulo,
            'descripcion'=>$request->descripcion,
            'contenido'=>$request->contenido,
            'uri_portada'=>$file_name,
            'category_id'=>$request->category_id,
            'autor_id'=>$autor->id
        ]);

        return redirect()->route('articleList');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $autor=$article->autor;
        return view('show',compact('article','autor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articleEdit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->except('file'));
       if($request->hasFile('file')){
        $file=$request->file;
        $file_name=time().".".$file->extension();
        $file->storeAs('public/imagenesportada',$file_name);
        $article->update(['uri_portada'=>$file_name]);
       }

        return redirect()->route('articleList');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        $autor=Auth::user();
        $articles=$autor->articles;
        return redirect()->route('articleList')->with(compact('articles'));
    }
}
