<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', function () {
    return 'Hello world from return';
});

Route::get('/hello', function () {
    echo 'Hello world from echo';
});

Route::get('/{prenom}/{nom}', function ($prenom, $nom) {
    return "Hello $prenom $nom";
});

Route::get('/listeFilms', function () {
    return 'Liste des films';
});

Route::get('/mauvaiseFacon', function () {
    return
'
<!doctype html>
<html lang="fr">
  <head>
      <meta charset="UTF-8">
      <title>Mauvaise façon</title>
  </head>
  <body>
      <p>Le fichier risque d\'être longggggg</p>
  </body>
</html>
';
});

Route::get('/{title}', function ($title) {
    return "Film : $title";
})->where('title', '[a-zA-Z ]+');