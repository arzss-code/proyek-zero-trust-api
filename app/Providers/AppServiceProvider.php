<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Passport::enablePasswordGrant();
        // Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');

        // Daftarkan Scopes untuk API di sini
        Passport::tokensCan([
            'lihat-profil' => 'Melihat data profil pengguna',
            'update-profil' => 'Memperbarui data profil pengguna',
            'lihat-laporan-keuangan' => 'Melihat laporan keuangan rahasia perusahaan',
        ]);
        Passport::setDefaultScope([
            'lihat-profil', // Scope default yang diberikan saat token dibuat
        ]);
    }
}
