<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Memproses data login
    public function loginStore(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Coba login web seperti biasa
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Tentukan scope berdasarkan role
            $scopes = ['lihat-profil'];
            if (trim(strtolower($user->role)) === 'admin') {
                $scopes[] = 'lihat-laporan-keuangan';
            }

            // Hapus token lama & buat yang baru
            $user->tokens()->delete();
            $tokenResult = $user->createToken('web-session-token', $scopes);
            // Ambil string token dari properti accessToken
            $token = $tokenResult->accessToken;

            // Simpan token yang valid ke session
            $request->session()->put('api_token', $token);

            return redirect()->intended('dashboard');
        }

        return back()->with('error', 'Email atau password yang Anda masukkan salah.');
    }

    // Menampilkan halaman registrasi
    public function showRegister()
    {
        return view('auth.register');
    }

    // Menyimpan data user baru
    public function registerStore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
