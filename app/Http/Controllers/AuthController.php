<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use phpseclib3\Crypt\Hash;

class AuthController extends Controller
{
    public function index(){
        return View('auth.signin');
    }

    public function signin(LoginRequest $request)
    {
        $credentials = $request->only('phone', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return to_route('signin')->withErrors([
            'notfound' => 'Numero ou mot de passe incorrect'
        ]);

    }
    public function signup()
    {
        return View('auth.signup');
    }

    public function register(RegisterRequest $request)
    {

        if($request->password != $request->confirmedpassword){
            return to_route('signup')->withErrors([
                'password' => 'Les mots de passe ne correspondent pas'
            ])->onlyInput('name', 'email', 'phone');
        }

        User::create([
           'name' => $request->name,
           'phone' => $request->phone,
           'email' => $request->email,
           'password' => \Illuminate\Support\Facades\Hash::make($request->password)
        ]);
        Auth::attempt($request->only('phone', 'password'));
        return redirect()->intended('/');
    }

    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callback(){
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = User::where('google_id', $googleUser->getId())->first();

            if(!$user){
                $newUser = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                ]);

                Auth::login($newUser);
            }else{
                Auth::login($user);
            }
            return redirect()->intended('/');
        }catch (\Throwable $th){
            echo 'Caught exception: ',  $th->getMessage(), "\n";
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->intended('/');
    }
}
