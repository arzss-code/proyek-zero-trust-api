<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception; // Import Exception untuk try-catch

class ApiController extends Controller
{
    /**
     * Mengembalikan data pengguna yang terautentikasi dengan format response yang lebih baik.
     */
    public function getAuthenticatedUser(Request $request)
    {
        try {
            // Jika berhasil, kembalikan response sukses yang terstruktur.
            return response()->json([
                'success' => true,
                'message' => 'Data pengguna berhasil diambil.',
                'data'    => $request->user()
            ], 200); // HTTP Status 200 OK

        } catch (Exception $e) {
            // Menangani error tak terduga jika terjadi.
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan pada server.',
                'errors'  => $e->getMessage()
            ], 500); // HTTP Status 500 Internal Server Error
        }
    }

    /**
     * Mengembalikan data laporan keuangan (contoh) dengan format response yang lebih baik.
     */
    public function getFinancialReport(Request $request)
    {

        try {
            $laporan = [
                'pendapatan_bulan_ini' => 'Rp 150.750.000',
                'pengeluaran_bulan_ini' => 'Rp 45.300.000',
                'laba_bersih' => 'Rp 105.450.000',
                'transaksi_terakhir' => [
                    ['tanggal' => '2025-06-05', 'deskripsi' => 'Pembayaran langganan AWS', 'jumlah' => -15000000],
                    ['tanggal' => '2025-06-04', 'deskripsi' => 'Pembayaran dari Klien Proyek A', 'jumlah' => 75000000],
                ]
            ];

            // Kembalikan response sukses yang terstruktur dan konsisten.
            return response()->json([
                'success' => true,
                'message' => 'Data laporan keuangan berhasil diambil.',
                'data'    => $laporan
            ], 200);

        } catch (Exception $e) {
            // Menangani error tak terduga jika terjadi.
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil laporan.',
                'errors'  => $e->getMessage()
            ], 500);
        }
    }
}
