<?php

use App\Http\Controllers\DashboardController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


//route for both
Route::group(['middleware'=>['auth']], function (){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

//route for user
Route::group(['middleware'=>['auth', 'role:user']], function (){

});

//route for admin
Route::group(['middleware'=>['auth', 'role:admin']], function (){

});