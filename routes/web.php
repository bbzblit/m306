<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SetController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
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
    if (Auth::check()){
        $user = Auth::user();

        return Inertia::render('Index', [
            "userName" => "{$user->first_name} {$user->last_name}"
        ]);    
    }
    return Inertia::render('Index');
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

Route::post("/login", [AuthController::class, 'login']);

Route::get("/logout", [AuthController::class, 'logout']);

Route::get("/import", function () {
    return Inertia::render("Set/Import", [
    ]);
});


Route::post("/import", [SetController::class, 'import']);

require __DIR__.'/auth.php';
