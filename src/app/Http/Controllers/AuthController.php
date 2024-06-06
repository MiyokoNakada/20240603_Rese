<?php

namespace App\Http\Controllers;

use Laravel\Fortify\Http\Requests\LoginRequest;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    protected $guard;

    //Registerの処理
    public function register(
        Request $request,
        CreatesNewUsers $creator
    ): RegisterResponse {
        if (config('fortify.lowercase_usernames')) {
            $request->merge([
                Fortify::username() => Str::lower($request->{Fortify::username()}),
            ]);
        }

        event(new Registered($user = $creator->create($request->all())));

        // $this->guard->login($user);

        return app(RegisterResponse::class);
    }

    //thanks画面表示
    public function thanks(){
        return view('auth.thanks');
    }

    //loginの処理
    public function login(LoginRequest $request)
    {
        return $this->loginPipeline($request)->then(function ($request) {
            return app(LoginResponse::class);
        });
    }

    //logoutの処理
    public function logout(Request $request): LogoutResponse
    {
        Auth::guard('web')->logout();

        if ($request->hasSession()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return app(LogoutResponse::class);
    }

}
