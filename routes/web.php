<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
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
    return view('login');
});

// ----( auth )----
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ----(barang)----
Route::prefix("barang")->name("barang.")->controller(BarangController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get("/detail/{id}", "detail")->name("detail");
    Route::get("/edit/{id}", "edit")->name("edit");
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::post("/update/{id}", "update")->name("update");
    Route::get("/destroy/{id}", "destroy")->name("destroy");
});

// ----(user)----
Route::prefix("user")->name("user.")->controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    // Route::get("/detail/{id}", "detail")->name("detail");
    Route::get("/edit/{id}", "edit")->name("edit");
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    // Route::post("/update/{id}", "update")->name("update");
    Route::get("/reset/{id}", "resetpass")->name("resetpass");
    Route::get("/destroy/{id}", "destroy")->name("destroy");
});

// ----(order)----
Route::prefix("order")->name("order.")->controller(OrderController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get("/detail/{id}", "detail")->name("detail");
    Route::get("/edit/{id}", "edit")->name("edit");
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::post("/update/{id}", "update")->name("update");
    Route::get("/destroy/{id}", "destroy")->name("destroy");
});
