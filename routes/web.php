<?php
use Illuminate\Support\Facades\Route; //added this line to declare route
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);


