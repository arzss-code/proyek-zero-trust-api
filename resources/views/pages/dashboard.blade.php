@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="min-h-screen bg-slate-50">
        <div class="container mx-auto px-4 py-8 sm:px-6 lg:px-8">

            <header class="mb-8">
                <h1 id="user-greeting" class="text-3xl font-bold text-slate-800 transition-colors duration-300">Memuat...</h1>
                <p class="mt-1 text-slate-600">Selamat datang kembali, mari kita lihat aktivitas Anda hari ini.</p>
            </header>

            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                <!-- Kolom Utama (Profil & Aksi) -->
                <main class="space-y-8 lg:col-span-2">
                    <!-- Kartu Profil -->
                    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-md">
                        <div class="mb-4 flex items-center">
                            <svg class="h-8 w-8 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            <h2 class="ml-3 text-xl font-semibold text-slate-800">Profil Pengguna</h2>
                        </div>
                        <div id="profile-container" class="animate-pulse space-y-3 text-slate-700">
                            <div class="h-4 w-3/4 rounded bg-slate-200"></div>
                            <div class="h-4 w-1/2 rounded bg-slate-200"></div>
                            <div class="h-4 w-1/4 rounded bg-slate-200"></div>
                        </div>
                    </div>

                    <!-- Kartu Aksi Cepat -->
                    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-md">
                        <h2 class="mb-4 text-xl font-semibold text-slate-800">Aksi Cepat</h2>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <a href="{{ route('reports.financial') }}"
                                class="group flex items-center rounded-lg bg-slate-50 p-4 transition-all duration-300 hover:bg-indigo-50">
                                <svg class="h-6 w-6 text-slate-500 group-hover:text-indigo-600"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 1.085-1.085-1.085m1.085 1.085L12 17.25l2.185-2.185m0 0l1.085 1.085L16.5 15.185m-7.5-3.885L12 12.5l2.185-2.185m0 0l1.085 1.085L16.5 11.315m-7.5-3.885L12 8.75l2.185-2.185m0 0l1.085 1.085L16.5 7.415m-15 3.885h16.5" />
                                </svg>
                                <span class="ml-3 font-medium text-slate-700 group-hover:text-indigo-800">Buka Laporan
                                    Keuangan</span>
                            </a>
                            <div class="group flex cursor-not-allowed items-center rounded-lg bg-slate-50 p-4 opacity-60">
                                <svg class="h-6 w-6 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.438.995a6.473 6.473 0 010 1.257c0 .381.145.754.438.995l1.003.827c.481.398.624 1.023.26 1.431l-1.296 2.247a1.125 1.125 0 01-1.37.49l-1.217-.456c-.355-.133-.75-.072-1.075.124a6.57 6.57 0 01-.22.127c-.331.183-.581.495-.644.87l-.213 1.281c-.09.543-.56.94-1.11.94h-2.593c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.063-.374-.313-.686-.645-.87a6.52 6.52 0 01-.22-.127c-.324-.196-.72-.257-1.075-.124l-1.217.456a1.125 1.125 0 01-1.37-.49l-1.296-2.247a1.125 1.125 0 01.26-1.431l1.003-.827c.293-.24.438-.613.438-.995a6.473 6.473 0 010-1.257c0-.381-.145-.754-.438-.995l-1.003-.827a1.125 1.125 0 01-.26-1.431l1.296-2.247a1.125 1.125 0 011.37-.49l1.217.456c.355.133.75.072 1.075-.124a6.57 6.57 0 01.22-.127c.331-.183-.581-.495-.644.87l.213 1.281z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span class="ml-3 font-medium text-slate-500">Pengaturan Akun</span>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- Kolom Samping -->
                <aside class="space-y-8">
                    <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-md">
                        <div class="mb-4 flex items-center">
                            <svg class="h-6 w-6 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>
                            <h2 class="ml-3 text-lg font-semibold text-slate-800">Notifikasi</h2>
                        </div>
                        <div class="py-4 text-center text-sm text-slate-500">Belum ada notifikasi baru.</div>
                    </div>
                    <div class="text-center">
                        <form action="{{ route('logout') }}" method="post" class="inline-block">
                            @csrf
                            <button type="submit"
                                class="inline-flex items-center rounded-lg border border-red-200 bg-red-50 px-4 py-2 text-sm font-semibold text-red-600 shadow-sm transition-colors duration-200 hover:bg-red-100 hover:text-red-700 focus:outline-none focus:ring-2 focus:ring-red-300">
                                <svg class="mr-2 h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-3A2.25 2.25 0 008.25 5.25V9m7.5 6v3.75A2.25 2.25 0 0113.5 21h-3a2.25 2.25 0 01-2.25-2.25V15m9-3H3m0 0l3.75-3.75M3 12l3.75 3.75" />
                                </svg>
                                Logout dari Akun
                            </button>
                        </form>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const apiToken = '{{ session('api_token') }}';

            if (!apiToken) {
                document.getElementById('user-greeting').textContent = 'Error: Token API tidak ditemukan.';
                return;
            }

            fetch('/api/v1/user', {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${apiToken}`
                    }
                })
                .then(response => response.json())
                .then(result => {
                    const profileContainer = document.getElementById('profile-container');
                    profileContainer.classList.remove('animate-pulse'); // Hapus efek skeleton

                    if (result.success) {
                        const user = result.data;
                        document.getElementById('user-greeting').textContent = `Selamat Datang, ${user.name}!`;

                        profileContainer.innerHTML = `
                <div class="flex items-center"><strong class="w-24">Nama:</strong> <span>${user.name}</span></div>
                <div class="flex items-center"><strong class="w-24">Email:</strong> <span>${user.email}</span></div>
                <div class="flex items-center"><strong class="w-24">Role:</strong> <span class="capitalize inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ${user.role === 'admin' ? 'bg-green-100 text-green-800' : 'bg-indigo-100 text-indigo-800'}">${user.role}</span></div>
            `;
                    } else {
                        document.getElementById('user-greeting').textContent = 'Gagal memuat data pengguna.';
                        profileContainer.innerHTML =
                            `<p class="text-red-500">Tidak bisa mengambil data profil.</p>`;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('user-greeting').textContent = 'Terjadi kesalahan jaringan.';
                });
        });
    </script>
@endsection
