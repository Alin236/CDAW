<?php

use App\Http\Controllers\{
    ProfileController,
    PokemonController,
    AccueilController,
    CombatController,
    TestController,
    HistoriqueController
};
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

Route::get('/getTest', [TestController::class, 'getTest']);
Route::post('/postTest', [TestController::class, 'postTest']);

Route::prefix('/')->group(function () {
    Route::get('/', [AccueilController::class, 'index'])->name('accueil');
    Route::get('/pokedex', [PokemonController::class, 'index'])->name('pokedex');
    Route::get('/combat', [CombatController::class, 'menu'])->middleware('auth')->name('combat');
    Route::get('/combat/classique', [CombatController::class, 'initiateCombatClassique'])->middleware('auth')->name('initialise combat classique');
    Route::post('/combat/user', [CombatController::class, 'combatChoix'])->middleware('auth');
    Route::post('/combat/classique', [CombatController::class, 'launchCombatClassique'])->middleware('auth')->name('combat classique');
    Route::put('/combat', [CombatController::class, 'save'])->middleware('auth');
    Route::get('/combat/semi_automatique', [CombatController::class, 'initiateCombatSemiAutomatique'])->middleware('auth')->name('initialise combat semi-automatique');
    Route::post('/combat/semi_automatique', [CombatController::class, 'launchCombatSemiAutomatique'])->middleware('auth')->name('combat semi-automatique');
    Route::get('/combat/automatique', [CombatController::class, 'initiateCombatAutomatique'])->middleware('auth')->name('initialise combat automatique');
    Route::post('/combat/automatique', [CombatController::class, 'launchCombatAutomatique'])->middleware('auth')->name('combat automatique');
    Route::get('/historique', [HistoriqueController::class, 'index'])->middleware('auth')->name('historique');
    Route::get('/test', function(){return view('test');})->middleware('auth')->name('test');
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