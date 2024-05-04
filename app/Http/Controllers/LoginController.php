<?php

namespace App\Http\Controllers;

use App\Models\TbPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $pegawai = TbPegawai::where('email', $credentials['email'])->first();

        if ($pegawai && Hash::check($credentials['password'], $pegawai->password)) {
            Auth::login($pegawai);
            return redirect()->intended('dashboard');
        }

        return redirect()->back()->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('login');
    }
}
