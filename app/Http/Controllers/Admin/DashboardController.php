<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post; // Jika Anda ingin mengambil data dari tabel posts
use Illuminate\Support\Facades\DB;
use App\Models\PermohonanVidcon;
use App\Models\Pemohon;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index()
    {
        $perluApproval = PermohonanVidcon::where('status_kegiatan', 'pending')->count();
        $perluDiproses = PermohonanVidcon::where('status_kegiatan', 'proses')->count();
        $selesaiDilaksanakan = PermohonanVidcon::where('status_kegiatan', 'selesai')->count();
        $userTerdaftar = Pemohon::count();

        $monthlyData = PermohonanVidcon::select(DB::raw('MONTH(tanggal_vidcon) as month'), DB::raw('count(*) as count'))
            ->groupBy('month')
            ->get()
            ->pluck('count', 'month')
            ->toArray();

        return view('admin.dashboard', compact('perluApproval', 'perluDiproses', 'selesaiDilaksanakan', 'userTerdaftar', 'monthlyData'));
    }

    public function dashboard()
    {
        // Ambil data jumlah vidcon per bulan
        $vidconData = PermohonanVidcon::select(
            DB::raw('MONTH(tanggal_vidcon) as month'),
            DB::raw('COUNT(*) as count')
        )
        ->groupBy('month')
        ->get()
        ->pluck('count', 'month')
        ->toArray();

        // Buat array dengan nilai default 0 untuk setiap bulan
        $monthlyData = array_fill(1, 12, 0);
        foreach ($vidconData as $month => $count) {
            $monthlyData[$month] = $count;
        }

        return view('admin.dashboard', compact('monthlyData'));
    }

}

