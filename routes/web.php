<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route("login");
});

Route::prefix("auth")->group(function () {
    Route::get("/login", [AuthController::class, "login"])->name("login");
    Route::get("/register", [AuthController::class, "register"])->name("register");

    Route::post('/login', [AuthController::class, "doLogin"]);
    Route::post('/register', [AuthController::class, "doRegister"]);
});

Route::get('/logout', [AuthController::class, "logout"]);

Route::middleware(['auth:admin,web'])->group(function () {
    Route::prefix("dashboard")->group(function () {
        Route::get("/", [DashboardController::class, "dashboard"])->name("dashboard");
    });

    Route::get("/detail/{id}", [DashboardController::class, "detail"]);
    Route::get("/beli/{id}", [DashboardController::class, "beli"]);
    Route::get("/keranjang", [DashboardController::class, "keranjang"]);
    Route::get("/keranjang/hapus/{id}", [DashboardController::class, "hapusKeranjang"]);
    Route::get("/keranjang/checkout", [DashboardController::class, "checkout"]);
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get("/kategori", [KategoriController::class, "index"]);
    Route::get("/kategori/form/{id?}", [KategoriController::class, "form"]);
    Route::post("/kategori/{id?}", [KategoriController::class, "store"]);
    Route::delete("/kategori/{id}", [KategoriController::class, "destroy"]);

    Route::get("/produk", [ProdukController::class, "index"]);
    Route::get("/produk/form/{id?}", [ProdukController::class, "form"]);
    Route::post("/produk/{id?}", [ProdukController::class, "store"]);
    Route::delete("/produk/{id}", [ProdukController::class, "destroy"]);
});
