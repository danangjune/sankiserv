<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PermohonanVidcon;
use Illuminate\Http\Request;

class PermohonanVidconController extends Controller
{
    public function index()
    {
        $permohonanVidcon = PermohonanVidcon::orderByRaw("FIELD(status_kegiatan, 'pending', 'proses', 'selesai')")->get();
        return view('admin.permohonan_vidcon', compact('permohonanVidcon'));
    }
}


