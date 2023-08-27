<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AutorController extends Controller
{
    public function updateEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'emailActual' => 'required|email|exists:autors,email',
            'email' => 'required|email|unique:autors,email',
            'emailConfirmado' => 'required|email|same:email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $autor = Autor::where('email', $request->emailActual)->first();
            $autor->email = $request->email;
            $autor->save();
            return redirect()->route('updateAutor');
        }
    }


    public function updatePassword(Request $request)
    {
        $autor = Auth::user();
        $validatorpassword = Validator::make($request->all(), [
            'passwordActual' => 'required|exists:autors,password',
            'password' => 'required',
            'passwordConfirmed' => 'required|same:password'
        ]);
        if ($validatorpassword->fails() && (!password_verify($request->passwordActual, $autor->password))) {
            return redirect()->back()->withErrors($validatorpassword,['contraseña_actual' => 'La contraseña actual es incorrecta.'])->withInput();
        } else {
            
            $autor->password =Hash::make($request->password);
            $autor->save();
            return redirect()->route('updateAutor');
        }
    }

    public function updateProfile(Request $request){
        $autor=Auth::user();
        
        $validatorfile = Validator::make($request->all(), [
            'file'=>'required'
        ]);
        if ($validatorfile->fails() ) {
            return redirect()->back()->withErrors($validatorfile)->withInput();
        } else {$file=$request->file;
        $file_name=time().".".$file->extension();
        $autor->uri_perfil=$file_name;
        $autor->save();
        $file->storeAs('public/Imagenesperfil',$file_name);
       
        return redirect()->route('articleList');}
         

    }
}

