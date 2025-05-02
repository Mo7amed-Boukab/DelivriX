<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    public function showLoginPage()
    {
        return view('auth.login');
    }


    public function showRegisterPage()
    {
        return view('auth.register');
    }
   
    public function register(RegisterRequest $request)
    {
        $request->validated();

        $user = Utilisateur::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'administrateur',
        ]);

        Auth::login($user);
        return redirect()->route($this->redirectBasedOnRole(Auth::user()->role));
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route($this->redirectBasedOnRole(Auth::user()->role));
        }

        return back()->withErrors([
            'email' => 'L\'adresse e-mail ou le mot de passe fourni est incorrect.'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    private function redirectBasedOnRole($role)
    {
        return match ($role) {
            'administrateur' => 'admin.dashboard',
            'livreur' => 'livreur.dashboard',
            'client' => 'client.dashboard',
            default => 'login',
        };
    }


    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
       $googleUser = Socialite::driver('google')->user();
       $userEmail = $googleUser->getEmail();

       $checkUser = Utilisateur::where('email', $userEmail)->first();

       if ($checkUser) {
           Auth::login($checkUser);
           return redirect()->route($this->redirectBasedOnRole(Auth::user()->role));
       } else {
           return redirect()->route('login.page')->withErrors(['email' => 'Aucun compte n\'est associé à cette adresse e-mail Google.']);
       }
    }
}
