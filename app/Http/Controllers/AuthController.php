<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\RegisterRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        $credencials = [
            'login' => $validated['login'],
            'password' => $validated['password'],
        ];
        if (Auth::attempt($credencials)) {

        }
    }
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();
        $newUser = User::create($validated);
        Auth::login($newUser);
    }
    public function logout(Request $request)
    {
        Auth::logout();
    }
    public function loginPage(Request $request)
    {


    }
    public function registerPage(Request $request)
    {

    }

    public function profilePage(Request $request)
    {

    }
    public function adminLoginPage(Request $request)
    {

    }
    public function adminDashboardPage(Request $request)
    {

    }
    public function adminEntry(Request $request)
    {
        $credencials = request()->only('login', 'password');
        if ($credencials['login'] === 'Admin' && $credencials['password'] === 'KorokNET') {

        }
    }
}
