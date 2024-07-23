<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PermohonanVidcon;
use App\Models\Pemohon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PDF;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\Shared\ZipArchive;


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

    public function storeDocx(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pemohon' => 'required|string',
            'opd' => 'required|string',
            'alamat_opd' => 'required|string',
            'dasar_pelaksanaan' => 'required|string',
            'nomor_surat' => 'required|string',
            'acara' => 'required|string',
            'hari_tanggal' => 'required|string',
            'waktu' => 'required|string',
            'tempat' => 'required|string',
            'peserta' => 'nullable|string',
            'dukungan_vidcon' => 'nullable|array',
            'nama_kepala_dinas' => 'required|string',
            'nip_kepala_dinas' => 'required|string',
            'pangkat_kepala_dinas' => 'required|string',
        ]);

        Log::info('Validated Data:', $validatedData);

        try {
            // Simpan
            $permohonan = PermohonanVidcon::create([
                'id_pemohon' => Auth::user()->pemohon->id_pemohon,
                'alamat_opd' => $request->alamat_opd,
                'dasar_pelaksanaan' => $request->dasar_pelaksanaan,
                'nomer_surat' => $request->nomor_surat,
                'acara' => $request->acara,
                'hari_tanggal' => $request->hari_tanggal,
                'waktu' => $request->waktu,
                'tempat' => $request->tempat,
                'peserta' => $request->peserta,
                'bentuk_dukungan' => json_encode($request->dukungan_vidcon ?? []),
                'nama_kepala' => $request->nama_kepala_dinas,
                'nip_kepala' => $request->nip_kepala_dinas,
                'pangkat_kepala' => $request->pangkat_kepala_dinas,
            ]);

            Log::info('Saved Permohonan:', $permohonan->toArray());

            // Ambil updated_at dari model
            $tanggal_pengajuan = $permohonan->updated_at->format('d-m-Y');

            // Settings::setZipClass(Settings::PCLZIP);

            // Buat TemplateProcessor
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(resource_path('docs/template_vidcon.docx'));

            Log::info('Template loaded successfully.');

            // Ganti placeholder
            $templateProcessor->setValue('opd_pemohon', $request->opd);
            $templateProcessor->setValue('alamat_opd', $request->alamat_opd);
            $templateProcessor->setValue('nomer_surat', $request->nomor_surat);
            $templateProcessor->setValue('tanggal_pengajuan', $tanggal_pengajuan->format('d-m-Y'));
            $templateProcessor->setValue('bentuk_dukungan', implode(', ', $request->dukungan_vidcon ?? []));
            $templateProcessor->setValue('dasar_pelaksanaan_vidcon', $request->dasar_pelaksanaan);
            $templateProcessor->setValue('acara_vidcon', $request->acara);
            $templateProcessor->setValue('hari_tanggal', $request->hari_tanggal);
            $templateProcessor->setValue('waktu', $request->waktu);
            $templateProcessor->setValue('tempat', $request->tempat);
            $templateProcessor->setValue('nama_kepala', $request->nama_kepala_dinas);
            $templateProcessor->setValue('nip_kepala', $request->nip_kepala_dinas);
            $templateProcessor->setValue('pangkat_kepala', $request->pangkat_kepala_dinas);
            $templateProcessor->setValue('peserta_vidcon', $request->peserta);

            Log::info('Placeholder replaced successfully.');

            // Simpan dokumen
            $fileName = 'permohonan_vidcon_' . time() . '.docx';
            $filePath = storage_path('app/docs/' . $fileName);
            $templateProcessor->saveAs($filePath);

            Log::info('File saved successfully at ' . $filePath);

            // Jika Sukses
            return response()->json([
                'message' => 'Permohonan vidcon berhasil disimpan.',
                'file' => url('storage/vidcon/' . $permohonan->id_permohonan_vidcon . '.docx')
            ]);

        } catch (\Exception $e) {
            Log::error('Error creating DOCX: ' . $e->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan permohonan vidcon.'], 500);
        }
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
