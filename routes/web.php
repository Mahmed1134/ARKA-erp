<?php
use App\Http\Controllers\DataController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

// عرض الصفحة الرئيسية
Route::get('/', function () {
    return view('welcome', ['products' => Product::all()]);
});

Route::post('/save-products', [DataController::class, 'storeFromBrowser']);