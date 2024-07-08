<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PermohonanVidcon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermohonanVidconController extends Controller
{
    public function index()
    {
        $permohonanVidcon = PermohonanVidcon::orderByRaw("FIELD(status_kegiatan, 'pending', 'proses', 'selesai')")->get();
        return view('admin.permohonan_vidcon', compact('permohonanVidcon'));

        $permohonanVidcon = PermohonanVidcon::with('pemohon')->get();
        return view('admin.permohonan_vidcon', compact('permohonanVidcon'));
    }

    public function prosesVidcon($id)
    {
        $vidcon = PermohonanVidcon::findOrFail($id);
        
        $vidcon->status_kegiatan = 'proses';
        $vidcon->save();

        return response()->json(['success' => 'Status updated to proses']);
    }

    public function selesaiVidcon($id)
    {
        $vidcon = PermohonanVidcon::findOrFail($id);
        
        $vidcon->status_kegiatan = 'selesai';
        $vidcon->save();

        return response()->json(['success' => 'Status updated to selesai']);
    }

}


