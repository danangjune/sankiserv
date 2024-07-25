<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\PermohonanTTE;
use App\Models\Pemohon;

class PermohonanTTEController extends Controller
{
    public function create()
    {
        // Ambil data pemohon yang sedang login
        $pemohon = Auth::user()->pemohon;

        return view('terbit-tte.create', compact('pemohon'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pemohon' => 'required|exists:pemohon,id',
            'alamat_opd' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'dasar_pelaksanaan' => 'required|string|max:255',
            'nomer_surat' => 'required|string|max:255',
            'status_kegiatan' => 'required|string|max:255',
        ]);

        PermohonanTTE::create($request->all());

        return redirect()->route('admin.permohonan_tte.index')->with('success', 'Permohonan TTE berhasil diajukan.');
    }
}
