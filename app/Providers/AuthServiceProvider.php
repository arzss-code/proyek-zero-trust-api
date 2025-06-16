<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport; // Import Passport

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Daftarkan rute-rute yang dibutuhkan oleh Passport
        Passport::routes();

        // Daftarkan Scopes untuk API
        Passport::tokensCan([
            'lihat-profil' => 'Melihat data profil pengguna',
            'update-profil' => 'Memperbarui data profil pengguna',
            'lihat-laporan-keuangan' => 'Melihat laporan keuangan rahasia perusahaan',
        ]);
    }
}
