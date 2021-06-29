<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\TagController;    
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\PartijaController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () { 
    return view('about');
});

Route::get('/contact', [ContactController::class, 'index'])->name('con');

Route::get('/home', function () {
    return 'homepage';
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    //$users = User::all();

    $users = DB::table('users')->get();

    return view('dashboard', compact('users'));

})->name('dashboard');

Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all_category');

Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');

Route::get('/tag/all', [TagController::class, 'index'])->name('all_tags');

Route::post('/tag/add', [TagController::class, 'addTag'])->name('store.tag');

Route::get('/tag/edit/{id}', [TagController::class, 'editTag']);

Route::post('/tag/update/{id}', [TagController::class, 'updateTag']);

Route::get('/players', [PlayersController::class, 'index'])->name('playerIndex');

Route::post('/players/add', [PlayersController::class, 'addPlayer'])->name('store.player');

Route::get('/partije', [PartijaController::class, 'index']);

Route::post('/partije/add', [PartijaController::class, 'addPartija'])->name('store.partija');


Route::post('/partije/{id}', [PartijaController::class, 'deletePartija']);

Route::get('players/{id}', [PlayersController::class, 'showPlayer']);

