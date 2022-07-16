<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * UserController
 */
class UserController extends Controller
{
    /**
     * register
     *
     * @return void
     */
    public function register()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('users.register');
    }

    /**
     * registerForm
     *
     * @param  mixed $request
     * @return void
     */
    public function registerForm(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/login');
    }

    /**
     * login
     *
     * @return void
     */
    public function login()
    {
        if (Auth::check()) {
            return redirect('/');
        }

        return view('users.login');
    }

    /**
     * loginForm
     *
     * @param  mixed $request
     * @return void
     */
    public function loginForm(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;

        $hashedPassword = DB::table('users')->where('email', $email)->value('password');

        if (Hash::check($password, $hashedPassword)) {

            if (Auth::attempt($credentials)) {

                $request->session()->regenerate();
                return redirect('/');
            }
        } else {

            return redirect('/login');
        }
    }

    /**
     * logout
     *
     * @param  mixed $request
     * @return void
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
