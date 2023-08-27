<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AutorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/articleList/create', [ArticleController::class, 'create'])->name('articleCreate');
    Route::post('/articleList/store', [ArticleController::class, 'store'])->name('articleStore');
    Route::get('/articleList', [ArticleController::class, 'index'])->name('articleList');
    Route::get('articleList/edit/{article}', [ArticleController::class, 'edit'])->name('articleEdit');
    Route::put('articleList/update/{article}', [ArticleController::class, 'update'])->name('articleUpdate');
    Route::delete('/articleList/delete/{article}', [ArticleController::class, 'destroy'])->name('deleteArticle');
    Route::get('/articleList/updateAutor', function () {
        $autor = Auth::user();
        return view('updateAutor', compact('autor'));
    })->name('updateAutor');
    Route::put('/articleList/updateAutor/email', [AutorController::class, 'updateEmail'])->name('updateEmail');
    Route::put('/articleList/updateAutor/password', [AutorController::class, 'updatePassword'])->name('updatePassword');
    Route::post('/articleList/updateAutor/profile', [AutorController::class, 'updateProfile'])->name('updateProfile');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::get('/article/{article}', [ArticleController::class, 'show'])->name('show');



Route::post('/RegisterVerify', [AuthController::class, 'RegisterVerify'])->name('RegisterVerify');
Route::post('/LoginVerify', [AuthController::class, 'LoginVerify'])->name('LoginVerify');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
