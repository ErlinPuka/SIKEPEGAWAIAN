<?php

namespace App\Http\Controllers;

use App\Models\TbPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('login');
    }

    public function showRegisterForm()
    {
        return view('register');
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

    public function register(Request $request)
    {
        TbPegawai::create([
            'nama_pegawai' => $request->nama_pegawai,
            'alamat' => $request->alamat,
            'no_telp'  => $request->no_telp,
            'email'  => $request->email,
            'password'  => Hash::make($request->password),
        ]);
        Alert::success("Success", "Data berhasil disimpan");

        return redirect("login");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}
