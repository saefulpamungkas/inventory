<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function login(Request $request)
    {
        Session::flash('email', $request->email); //agar tetap menampilkan email yang salah tadi di form input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.require' => 'Email Wajib diisi',
            'password.require' => 'Password Wajib diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            //kalau authentikasi sukses
            $request->session()->regenerate(); //opsi
            return redirect()->intended('dashboard')->with('success', 'Berhasil Login'); //intended
        }
        //kalau gagal
        return redirect('/')->with('toast_error', 'Username dan Password yang dimasukan tidak valid');

        // if (Auth::attempt($infologin)) {
        //     //kalau authentikasi sukses
        //     $request->session()->regenerate(); //opsi
        //     return redirect()->intended('dashboard')->with('success', 'Berhasil Login'); //intended
        // } else {
        //     //kalau gagal
        //     return redirect('/')->with('toast_error', 'Username dan Password yang dimasukan tidak valid');
        // }

        // $credentials = $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);

        // //Jika percobaan berhasil masuk ke home
        // if (Auth::attempt([$credentials])) {
        //     $request->session()->regenerate(); //regenerate() berguna untuk menghindari serangan hacker masuk celah keamanan dengan menggunakan session
        //     return redirect()->intended('/dashboard');
        // }

        // //Jika tidak, percobaan berhasil tampilkan pesan login faled
        // return back()->with('loginError', 'Login failed');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
