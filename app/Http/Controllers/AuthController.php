<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login(Request $request)
    {

    }


    public function register(Register $request)
    {
        error_log("Registering user");
        $user = User::create($request->validated());



        return Inertia::render("Index", [
            "userName" => "{$user->first_name} {$user->last_name}",
        ]);
    }
}
