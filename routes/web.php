<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pizza;
use App\Http\Controllers\AdminController;

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
// Route::middleware("checkRole:user")
Route::get('/', [pizza::class, 'index']);
Route::get('/reg', [pizza::class, 'reg'])->name('reg');
Route::get('/auth', [pizza::class, 'auth'])->name('auth');
Route::get('/catalog', [pizza::class, 'catalog']);
Route::get('/pizza_page', [pizza::class, 'pizza_page']);
Route::get('/profile', [pizza::class, 'profile']);
Route::get('/orders', [pizza::class, 'orders']);
Route::get('/payment/{id}', [pizza::class, 'payment']);
Route::get('/make_pizza', [pizza::class, 'make_pizza']);

Route::get('/pizza_page/{id}', [pizza::class, 'pizza_page']);


Route::post('reg', [pizza::class, 'users_valid'])->name('reg');
Route::post('auth', [pizza::class, 'users_auth'])->name('auth');

Route::get('/logout', function(){
    Auth::logout();
    return redirect ('/');

})->name('logout');
Route::middleware('checkRole:admin')->group(function (){
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin'); // переход на админ-панель
    Route::get('/admin_update/{id}', [AdminController::class, 'admin_update']); //страница с редактированием
    Route::post('admin_update/{id}', [AdminController::class, 'update']); //операция редактирования
    Route::get('/admin_delete/{id}', [AdminController::class, 'delete']); // операция удаления
    Route::post('/admin_add', [AdminController::class, 'create_item']); //операция добавления
});
Route::post("make_order", [pizza::class, 'make_application']);