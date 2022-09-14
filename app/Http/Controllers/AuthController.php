<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView(Request $request)
    {
        $route = $request->route()->getName();
        return view('auth.login', compact('route'));
    }

    public function loginCheck(Request $request)
    {

        if ($request->route == 'login.admin') {
            $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            if (auth()->attempt(['username' => $request->username, 'password' => $request->password])) {
                return redirect()->route('admin.dashboard')->with('success', 'Selamat datang ' . auth()->user()->name);
            }
            return redirect()->back()->with('error', 'Username atau password salah');
        }
    }

    public function Logout()
    {
        if (Auth::user()->roles != 'user') {
            auth()->logout();
            return redirect()->route('login.admin')->with('success', 'Logout sukses');
        }
    }
}
