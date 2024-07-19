<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PermohonanVidcon;
use App\Models\Pemohon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Storage;


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

    public function create()
    {
        $pemohon = Pemohon::all();
        return view('vidcon.create', compact('pemohon'));
    }

    // public function store(Request $request)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'id_pemohon' => 'required',
    //         'judul_vidcon' => 'required|string|max:255',
    //         'tanggal_vidcon' => 'required|date',
    //         'waktu_vidcon' => 'required',
    //         'lokasi_vidcon' => 'required|string|max:255',
    //         'peserta_vidcon' => 'required|string|max:255',
    //         'dukungan_vidcon' => 'required|array',
    //     ]);

    //     // Buat PDF dari input
    //     $pdf = PDF::loadView('vidcon.pdf', $request->all());

    //     // Simpan PDF ke storage dan dapatkan path-nya
    //     $pdfPath = 'pdfs/' . time() . '_' . $request->id_pemohon . '.pdf';
    //     Storage::put($pdfPath, $pdf->output());

    //     // Simpan data ke database
    //     $permohonanVidcon = new PermohonanVidcon([
    //         'id_pemohon' => $request->id_pemohon,
    //         'judul_vidcon' => $request->judul_vidcon,
    //         'tanggal_vidcon' => $request->tanggal_vidcon,
    //         'waktu_vidcon' => $request->waktu_vidcon,
    //         'lokasi_vidcon' => $request->lokasi_vidcon,
    //         'peserta_vidcon' => $request->peserta_vidcon,
    //         'dukungan_vidcon' => json_encode($request->get('dukungan_vidcon')),
    //         'status_kegiatan' => 'pending',
    //         'pdf_path' => $pdfPath,
    //     ]);

    //     $permohonanVidcon->save();

    //     // Simpan path PDF ke dalam session
    //     session(['pdf_path' => $permohonanVidcon->pdf_path]);

    //     return redirect()->route('vidcon.download_pdf')->with('success', 'Permohonan Vidcon berhasil disimpan dan PDF telah dihasilkan.');
    // }

    public function download_pdf()
    {
        return view('vidcon.download-pdf');
    }

    public function download()
    {
        $pdfPath = session('pdf_path');

        if ($pdfPath) {
            return response()->download(storage_path('app/' . $pdfPath));
        } else {
            abort(404);
        }
    }
}
