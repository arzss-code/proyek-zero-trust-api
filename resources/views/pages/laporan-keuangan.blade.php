@extends('layouts.app')

@section('title', 'Laporan Keuangan')

@section('content')
    <div class="min-h-screen bg-slate-50">
        <div class="container mx-auto px-4 py-8 sm:px-6 lg:px-8">

            <header class="mb-8">
                <nav class="mb-2 text-sm" aria-label="Breadcrumb">
                    <ol class="inline-flex list-none p-0">
                        <li class="flex items-center"><a href="{{ route('dashboard') }}"
                                class="text-slate-500 hover:text-slate-700">Dashboard</a><svg
                                class="mx-3 h-3 w-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path
                                    d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569 9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                            </svg></li>
                        <li><span class="font-medium text-slate-700">Laporan Keuangan</span></li>
                    </ol>
                </nav>
                <div class="flex items-center justify-between">
                    <h1 class="text-3xl font-bold text-slate-800">Laporan Keuangan</h1>
                    <button
                        class="cursor-not-allowed rounded-lg bg-indigo-600 px-4 py-2 font-bold text-white opacity-50 transition duration-300 hover:bg-indigo-700">
                        Download PDF
                    </button>
                </div>
            </header>

            <div id="report-container">
                <!-- Skeleton Loader -->
                <div class="animate-pulse space-y-8">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                        <div class="h-24 rounded-lg bg-slate-200"></div>
                        <div class="h-24 rounded-lg bg-slate-200"></div>
                        <div class="h-24 rounded-lg bg-slate-200"></div>
                    </div>
                    <div class="h-64 rounded-lg bg-slate-200"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const apiToken = '{{ session('api_token') }}';
            const reportContainer = document.getElementById('report-container');

            fetch('/api/v1/laporan-keuangan', {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${apiToken}`
                    }
                })
                .then(response => {
                    if (response.status === 403) {
                        reportContainer.innerHTML = `
                <div class="bg-white text-center py-16 rounded-xl shadow-md border border-red-200">
                    <svg class="mx-auto h-16 w-16 text-red-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" /></svg>
                    <h3 class="mt-4 text-xl font-semibold text-slate-900">Akses Ditolak</h3>
                    <p class="mt-2 text-slate-500">Anda tidak memiliki izin (scope) yang diperlukan untuk melihat laporan ini.</p>
                </div>`;
                        return null;
                    }
                    return response.json();
                })
                .then(result => {
                    if (result && result.success) {
                        const report = result.data;

                        // PERBAIKAN: Konversi string ke angka yang lebih andal
                        const pendapatan = parseFloat(String(report.pendapatan_bulan_ini).replace(/\D/g, ''));
                        const pengeluaran = parseFloat(String(report.pengeluaran_bulan_ini).replace(/\D/g, ''));
                        const total = pendapatan + pengeluaran;
                        const persenPendapatan = total > 0 ? (pendapatan / total) * 100 : 0;
                        const persenPengeluaran = total > 0 ? (pengeluaran / total) * 100 : 0;

                        reportContainer.innerHTML = `
                <div class="bg-white p-6 rounded-xl shadow-md border border-slate-200">
                    <!-- Ringkasan Kartu -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="p-4 border border-green-200 bg-green-50 rounded-lg"><p class="text-sm text-green-700">Pendapatan</p><p class="text-2xl font-semibold text-green-900">${report.pendapatan_bulan_ini}</p></div>
                        <div class="p-4 border border-red-200 bg-red-50 rounded-lg"><p class="text-sm text-red-700">Pengeluaran</p><p class="text-2xl font-semibold text-red-900">${report.pengeluaran_bulan_ini}</p></div>
                        <div class="p-4 border border-blue-200 bg-blue-50 rounded-lg"><p class="text-sm text-blue-700">Laba Bersih</p><p class="text-2xl font-semibold text-blue-900">${report.laba_bersih}</p></div>
                    </div>

                    <!-- Visualisasi Bar Chart Sederhana -->
                    <h3 class="text-lg font-semibold text-slate-800 mb-2">Visualisasi Pendapatan vs Pengeluaran</h3>
                    <div class="w-full bg-slate-200 rounded-full h-8 mb-8 flex overflow-hidden">
                        <div class="bg-green-500 h-8" style="width: ${persenPendapatan}%" title="Pendapatan: ${persenPendapatan.toFixed(1)}%"></div>
                        <div class="bg-red-500 h-8" style="width: ${persenPengeluaran}%" title="Pengeluaran: ${persenPengeluaran.toFixed(1)}%"></div>
                    </div>

                    <!-- Tabel Transaksi -->
                    <h3 class="text-lg font-semibold text-slate-800 mb-4">Transaksi Terakhir</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200">
                            <thead class="bg-slate-50">
                                <tr><th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Tanggal</th><th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Deskripsi</th><th class="px-6 py-3 text-right text-xs font-medium text-slate-500 uppercase tracking-wider">Jumlah</th></tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-200">
                                ${report.transaksi_terakhir.map(tx => `
                                        <tr class="hover:bg-slate-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">${tx.tanggal}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">${tx.deskripsi}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-right font-mono ${tx.jumlah > 0 ? 'text-green-600' : 'text-red-600'}">${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(tx.jumlah)}</td>
                                        </tr>`).join('')}
                            </tbody>
                        </table>
                    </div>
                </div>
            `;
                    } else if (result) {
                        // PERBAIKAN: Menghapus backslash yang salah
                        reportContainer.innerHTML =
                            `<div class="bg-white p-6 rounded-lg shadow-md"><p class="text-red-500">Gagal memuat data: ${result.message || 'Error tidak diketahui'}</p></div>`;
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
@endsection
