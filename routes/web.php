<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MaterialController;
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
})->name('index')->middleware('blmlogin');

Route::get('/home', [AdminController::class, 'index'])->name('home')->middleware('dahlogin');

// ----( auth )----
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ----(barang)----
Route::prefix("barang")->name("barang.")->middleware('dahlogin')->controller(BarangController::class)->group(function () {
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
    Route::get('/', 'index')->name('index')->middleware('roleadmin');
    // Route::get("/detail/{id}", "detail")->name("detail");
    // Route::get("/edit/{id}", "edit")->name("edit");
    Route::get('/create', 'create')->name('create')->middleware('roleadmin');
    Route::post('/store', 'store')->name('store')->middleware('roleadmin');
    Route::post("/update/{id}", "update")->name("update")->middleware('dahlogin');
    Route::get("/reset/{id}", "resetpass")->name("resetpass")->middleware('roleadmin');
    Route::get("/destroy/{id}", "destroy")->name("destroy")->middleware('roleadmin');
});

// ----(order)----
Route::prefix("order")->name("order.")->middleware('dahlogin')->controller(OrderController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get("/detail/{id}", "detail")->name("detail");
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::post("/update/{id}", "update")->name("update");
});

// ----(material)----
Route::prefix("material")->name("material.")->middleware('dahlogin')->controller(MaterialController::class)->group(function () {
    Route::post('/store', 'store')->name('store');
    Route::post("/update/{id}", "update")->name("update");
    Route::get("/destroy/{id}", "destroy")->name("destroy");
});

// ----(kategori)----
Route::prefix("kategori")->name("kategori.")->middleware('dahlogin')->controller(KategoriController::class)->group(function () {
    Route::post('/store', 'store')->name('store');
    Route::post("/update/{id}", "update")->name("update");
    Route::get("/destroy/{id}", "destroy")->name("destroy");
});
