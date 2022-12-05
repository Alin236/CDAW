<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\AccueilController;
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

Route::prefix('/')->group(function () {
    Route::get('/', [AccueilController::class, 'index'])->name('accueil');
    Route::get('/pokedex', [PokemonController::class, 'index'])->name('pokedex');
    Route::get('/combat', function(){return view('combat');})->middleware('auth')->name('combat');
    Route::get('/historique', function(){return view('historique');})->name('historique');
});

Route::prefix('/decouverteDeLaravel')->group(function () {
    Route::get('/', function () {
        return 'Hello world from return';
    });

    Route::get('/hello', function () {
        echo 'Hello world from echo';
    });

    Route::get('/listePokemons', function () {
        return 'Liste des pokémons';
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

    Route::get('/listePokemonsView', function () {
        return view('listePokemons');
    });

    Route::get('/listePokemonsController/{param?}', 'App\Http\controllers\listePokemonsController@getListePokemons');

    Route::get('/{prenom}/{nom}', function ($prenom, $nom) {
        return "Hello $prenom $nom";
    });

    Route::get('/{title}', function ($title) {
        return "Film : $title";
    })->where('title', '[a-zA-Z ]+');
});

// ===== Partie créer par Breeze =========================================
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
