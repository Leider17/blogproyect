<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Http\Requests\registerRequest;
use App\Models\Autor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }
    public function RegisterVerify(registerRequest $request){
       // $file=$request->file;
       // $file_name=time().".".$file->extension();
       // $file->storeAs('public/Imagenesperfil',$file_name);
        Autor::create([
            'nombre'=>$request->nombre,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        return redirect()->route('login');
    }

    public function login(){
        return view('login');
    }

    public function LoginVerify(loginRequest $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $autor=Autor::where('email',$request->email)->first();
            
            if($autor->articles->count()>0){
                $articles=$autor->articles;
            }
            else{
                $articles=[];
            }

            return view('articleList', compact('autor', 'articles'));
        }

        return redirect()->route('login')->withErrors([
            'email' => 'Correo o contraseña incorrectas',
        ]);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }
}
