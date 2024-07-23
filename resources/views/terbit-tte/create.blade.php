@include('frontlayout.header')
@include('frontlayout.navbar')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center mt-4 mb-4">
                <h3><b>FORM PERMOHONAN PENERBITAN TTE</b></h3>
            </div>
            <div class="card">
                <div class="card-header" style="background-image: url({{asset('logos')}}/nap.png);"></div>

                <div class="card-body">
                <form method="POST" action="{{ route('terbit-tte.store') }}">
        @csrf
        <div class="form-group">
            <label for="nama_pemohon">Nama Pemohon</label>
            <input type="text" class="form-control" id="nama_pemohon" value="{{ Auth::user()->name ?? '' }}" readonly>
        </div>
        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" required>
        </div>
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" required>
        </div>
        <div class="form-group">
            <label for="pangkat_golongan">Pangkat/Golongan</label>
            <input type="text" class="form-control" id="pangkat_golongan" name="pangkat_golongan" required>
        </div>
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" required>
        </div>
        <div class="form-group">
            <label for="unit_kerja">Unit Kerja</label>
            <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" required>
        </div>
        <div class="form-group">
            <label for="opd_pemohon">OPD Pemohon</label>
            <input type="text" class="form-control" id="opd_pemohon" value="{{ Auth::user()->pemohon->opd_pemohon ?? '' }}" readonly>
        </div>
        <div class="form-group">
            <label for="alamat_opd">Alamat OPD</label>
            <input type="text" class="form-control" id="alamat_opd" name="alamat_opd" required>
        </div>
        <div class="form-group">
            <label for="nomer_surat">Nomer Surat</label>
            <input type="text" class="form-control" id="nomer_surat" name="nomer_surat" required>
        </div>
        <div class="form-group">
            <label for="no_telepon">No Telepon</label>
            <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
        </div>
        <div class="form-group">
            <label for="keterangan_tambahan">Keterangan Tambahan</label>
            <textarea class="form-control" id="keterangan_tambahan" name="keterangan_tambahan"></textarea>
        </div>
        <button type="submit" class="btn" style="background-color: #36CCD0;"><b class="text-light">Submit</b></button>
    </form>
                </div>
                
                <div class="card-footer" style="background-image: url({{asset('logos')}}/nap.png);"></div>
            </div>
        </div>
    </div>
</div>

@include('frontlayout.footer')
