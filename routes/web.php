<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'dashboard', 'middleware' => 'auth' ], function(){
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::resources([
        'post' => PostController::class,
        'category' => CategoryController::class,
    ]);

});

require __DIR__.'/auth.php';
