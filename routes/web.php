<?php

use App\Http\Controllers\AuthentificationControleur;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PingPongControleur;
use App\Http\Controllers\TestFlashController;
use App\Http\Controllers\TodoControleur;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\CheckTodo;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ['titre' => 'Mon premier exemple.']);
});

Route::get('/ping', [PingPongControleur::class, 'ping']);
Route::get('/pong', [PingPongControleur::class, 'pong']);

Route::get('/flash', [TestFlashController::class, 'main']);
Route::post('/traitement', [TestFlashController::class, 'traitement']);

Route::get('/layout', [TodoControleur::class, 'listTodo']);
Route::post('/layout', [TodoControleur::class, 'addTodo'])->middleware(CheckAuth::class)->middleware(CheckTodo::class);

Route::get('/termine/{id}', [TodoControleur::class, 'markAsDone'])->middleware(CheckAuth::class);
Route::get('/supprime/{id}', [TodoControleur::class, 'deleteTodo'])->middleware(CheckAuth::class);

Route::get('/contact',  [ContactController::class, 'afficheForm']);
Route::post('/contact',  [ContactController::class, 'addMail'])->middleware(CheckAuth::class);

Route::get('/login', [AuthentificationControleur::class, 'login']);
Route::post('/traitementLogin', [AuthentificationControleur::class, 'traitementLogin']);
Route::get('/register', [AuthentificationControleur::class, 'register']);
Route::post('/traitementRegister', [AuthentificationControleur::class, 'traitementRegister']);
