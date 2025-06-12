<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AboutController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
route::post('/product', [ProductController::class, 'store'])->name('product.store');
route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
route::post('/product/{id}', [ProductController::class, 'update'])->name('product.update');
route::get('/product/delete{id}', [ProductController::class, 'destroy'])->name('product.destroy');
route::get('/product/json', [ProductController::class, 'json'])->name('product.json');
route::post( '/product/{id}/toggle-active', [ProductController::class,'toggleActive'])->name('product.toggleActive');

route::get('/about', [AboutController::class,'index'])->name('about.index');

