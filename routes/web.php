<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pagecontroller;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/aboutus', [Pagecontroller::class, 'about'])->name('about');
Route::get('/services', [Pagecontroller::class, 'ourservices'])->name('ourservices');