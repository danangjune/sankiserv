<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        // Validasi input
        $validated = $request->validate([
            'nip' => 'required|string',
            'nik' => 'required|string',
            'pangkat_golongan' => 'required|string',
            'jabatan' => 'required|string',
            'unit_kerja' => 'required|string',
            'alamat_opd' => 'required|string',
            'nomer_surat' => 'required|string',
            'no_telepon' => 'required|string',
            'keterangan_tambahan' => 'nullable|string',
        ]);

        // Simpan data ke database atau lakukan tindakan lain
        // Contoh: PermohonanTTE::create($validated);

        // return redirect()->route('admin.permohonan_tte.create')->with('success', 'Form submitted successfully!');
    }
}
