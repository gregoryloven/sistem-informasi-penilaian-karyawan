<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $type = $request->input('type');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->type == $type) {
                if ($user->type === 0 || $user->type === 1 || $user->type === 2) {
                    return redirect()->route('employee.index');
                }
            
                return redirect()->intended('/home');
            } else {
                Auth::logout(); // Logout pengguna jika tipe tidak sesuai
                return back()->withErrors(['email' => 'Tipe User Tidak Sesuai']);
            }

            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }
}
