<?php

use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Index', [
    ]);
});

Route::post("/register",  [AuthController::class, 'register']);

Route::get("/register", function () {
    return Inertia::render("Auth/Register", [
    ]);
});



Route::get("/login", function () {
    return Inertia::render("Auth/Login", [
    ]);
});


require __DIR__.'/auth.php';
