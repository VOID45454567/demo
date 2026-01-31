<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\RegisterRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use App\Models\Application;

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
            return redirect()->route('auth.profile');
        } else {
            return redirect()->back()->with('error', 'Неверные данные');
        }
    }
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();
        $newUser = User::create($validated);
        Auth::login($newUser);
        return redirect()->route('auth.profile');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
    public function loginPage(Request $request)
    {
        return view('auth.login');
    }
    public function registerPage(Request $request)
    {
        return view('auth.register');
    }

    public function profilePage(Request $request)
    {
        return view('auth.profile');
    }
    public function adminLoginPage(Request $request)
    {
        return view('admin.login');
    }
    public function adminDashboardPage(Request $request)
    {
        $applications = Application::all();
        $users = User::all();
        return view('admin.index', compact(['applications', 'users']));
    }
    public function adminEntry(Request $request)
    {
        $credencials = $request->only('login', 'password');
        if ($credencials['login'] === 'Admin' && $credencials['password'] === 'KorokNET') {
            return redirect()->route('auth.admin-dashboard');
        } else {
            return redirect()->back()->with('error', 'Неверные данные');
        }
    }
}
