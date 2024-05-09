<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Providers\RouteServiceProvider;


class LoginController extends Controller
{
    /**
     * Форма логина.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function username()
    {
        return 'login';
    }

    /**
     * аутентификация пользователя.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // проверка входных данных
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            
            $user = Auth::user(); 
            if ($user->Role === 'admin') {                
                return redirect()->intended('/users');
            } else {                
                return redirect()->intended('/documents');
            }
        } else {            
            return back()->withErrors([
                'login' => 'Неверные учетные данные.',
            ]);
        }
    }

    /**
     * логаут
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}