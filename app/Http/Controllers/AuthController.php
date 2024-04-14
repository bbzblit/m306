<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\Login;
use App\Http\Requests\Auth\Register;
use App\Http\Requests\Auth\PasswordReset;
use App\Http\Requests\Auth\PasswordResetCallback;
use App\Models\PasswordResetRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Mailgun\Mailgun;

class AuthController extends Controller
{

    public function login(Login $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    public function register(Register $request)
    {
        User::create($request->validated());

        return redirect("/login");
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function passwordReset(PasswordReset $request)
    {   
        $email = $request->validated()["email"];
        $user = User::where("email", $email)->first();

        if ($user) {
            $mgClient = Mailgun::create(
                env('MAILGUN_SECRET'),
                env('MAILGUN_ENDPOINT'),
            );
            $domain = env('MAILGUN_DOMAIN');
            $randomCode = bin2hex(random_bytes(64));
            
            PasswordResetRequest::create([
                "code" => $randomCode,
                "user_id" => $user->id,
            ]);

            $params = array(
                'from' => 'BetterLet <m306@mx.ynnk.dev>',
                'to' => $user->email,
                'subject' => 'Your Password Reset Link',
                'template' => 'pw reset betterlet',
                'v:name' => $user->first_name . " " . $user->last_name,
                'v:link' => env('APP_URL') . "/passwordreset/" . $randomCode
            );

            $mgClient->messages()->send($domain, $params);
        }

        return Inertia::render("Auth/PasswordReset", [
            "reseted" => true,
        ]);
    }

    public function passwordResetForm(PasswordResetCallback $request, $code)
    {
        $passwordResetRequest = PasswordResetRequest::where("code", $code)->first();

        if ($passwordResetRequest) {
            $user = User::find($passwordResetRequest->user_id);
            $user->password = bcrypt($request->validated()["password"]);
            $user->save();
            $passwordResetRequest->delete();
        }

        return redirect("/login");
    }
}
