<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;



class GoogleLoginController extends Controller
{
    /**
     * Mengarahkan pengguna ke halaman autentikasi Google.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Mendapatkan informasi pengguna dari Google dan melakukan login.
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::updateOrCreate(
                ['google_id' => $googleUser->getId()],
                [
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => Hash::make('password_dari_google_'.now())
                ]
            );

            Auth::login($user, true);

            // Tentukan scope berdasarkan role
            $scopes = ['lihat-profil'];
            if ($user->role === 'admin') {
                $scopes[] = 'lihat-laporan-keuangan';
            }

            // Hapus token lama & buat yang baru
            $user->tokens()->delete();
            $tokenResult = $user->createToken('google-login-token', $scopes);
            $token = $tokenResult->accessToken;

            // Simpan token di session
            request()->session()->put('api_token', $token);

            return redirect('/dashboard');

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Login dengan Google gagal.');
        }
    }

}
