<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemohon;

class PemohonController extends Controller
{
    public function index()
    {
        $pemohons = Pemohon::all();
        return view('pemohon.index', compact('pemohons'));
    }

    public function create()
    {
        return view('pemohon.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemohon' => 'required',
            'nip_pemohon' => 'required',
            'opd_pemohon' => 'required',
            'email_pemohon' => 'required|email',
        ]);

        Pemohon::create($request->all());

        return redirect()->route('pemohon.index')
                         ->with('success', 'Pemohon created successfully.');
    }

    public function show($id)
    {
        $pemohon = Pemohon::findOrFail($id);
        return view('pemohon.show', compact('pemohon'));
    }

    public function edit($id)
    {
        $pemohon = Pemohon::findOrFail($id);
        return view('pemohon.edit', compact('pemohon'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pemohon' => 'required',
            'nip_pemohon' => 'required',
            'opd_pemohon' => 'required',
            'email_pemohon' => 'required|email',
        ]);

        $pemohon = Pemohon::findOrFail($id);
        $pemohon->update($request->all());

        return redirect()->route('pemohon.index')
                         ->with('success', 'Pemohon updated successfully.');
    }

    public function destroy($id)
    {
        $pemohon = Pemohon::findOrFail($id);
        $pemohon->delete();

        return redirect()->route('pemohon.index')
                         ->with('success', 'Pemohon deleted successfully.');
    }
}

