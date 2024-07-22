@include('frontlayout.header')
@include('frontlayout.navbar')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center mt-4 mb-4">
                <h3><b>FORM PERMOHONAN VIDCON</b></h3>
            </div>
            <div class="card">
                <div class="card-header" style="background-image: url({{asset('logos')}}/nap.png);"></div>

                <div class="card-body">
                <form action="{{ route('vidcon.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_pemohon">Nama Pemohon</label>
            <input type="text" class="form-control" id="nama_pemohon" name="nama_pemohon" value="{{ Auth::user()->name }}" readonly>
        </div>
        
        <div class="form-group">
            <label for="opd_pemohon">Leading Sektor / OPD Pemohon</label>
            <input type="text" class="form-control" id="opd_pemohon" name="opd_pemohon" value="{{ Auth::user()->pemohon->opd_pemohon ?? '' }}" readonly>
        </div>
        
        <div class="form-group">
            <label for="alamat_opd">Alamat OPD</label>
            <input type="text" class="form-control" id="alamat_opd" name="alamat_opd">
        </div>
        
        <div class="form-group">
            <label for="dasar_vidcon">Dasar Pelaksanaan Vidcon</label>
            <textarea class="form-control" id="dasar_vidcon" name="dasar_vidcon"></textarea>
        </div>
        
        <div class="form-group">
            <label for="nomor_surat">Nomer Surat</label>
            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat">
        </div>
        
        <div class="form-group">
            <label for="acara_vidcon">Acara Vidcon</label>
            <input type="text" class="form-control" id="acara_vidcon" name="acara_vidcon">
        </div>
        
        <div class="form-group">
            <label for="tanggal_vidcon">Hari dan Tanggal</label>
            <input type="date" class="form-control" id="tanggal_vidcon" name="tanggal_vidcon">
        </div>
        
        <div class="form-group">
            <label for="waktu_vidcon">Waktu</label>
            <input type="time" class="form-control" id="waktu_vidcon" name="waktu_vidcon">
        </div>
        
        <div class="form-group">
            <label for="tempat_vidcon">Tempat</label>
            <input type="text" class="form-control" id="tempat_vidcon" name="tempat_vidcon">
        </div>
        
        <div class="form-group">
            <label for="peserta_vidcon_luring">Peserta Vidcon</label>
            <input type="text" class="form-control" id="peserta_vidcon" name="peserta_vidcon">
        </div>
              
        <div class="form-group">
            <label for="dukungan_vidcon">Bentuk Dukungan</label>
            <div class="checkbox">
                <label><input type="checkbox" name="dukungan_vidcon[]" value="link zoom"> Link Zoom</label>
                <label><input type="checkbox" name="dukungan_vidcon[]" value="alat vidcon dan operator"> Alat Vidcon dan Operator</label>
                <label><input type="checkbox" name="dukungan_vidcon[]" value="jaringan internet"> Jaringan Internet</label>
                <label><input type="checkbox" name="dukungan_vidcon[]" value="internet on demand"> Internet On Demand</label>
            </div>
        </div>
        
        <div class="form-group">
            <label for="nama_kepala_dinas">Nama Kepala Dinas</label>
            <input type="text" class="form-control" id="nama_kepala_dinas" name="nama_kepala_dinas">
        </div>
        
        <div class="form-group">
            <label for="nip_kepala_dinas">NIP Kepala Dinas</label>
            <input type="text" class="form-control" id="nip_kepala_dinas" name="nip_kepala_dinas">
        </div>
        
        <div class="form-group">
            <label for="pangkat_kepala_dinas">Pangkat Kepala Dinas</label>
            <input type="text" class="form-control" id="pangkat_kepala_dinas" name="pangkat_kepala_dinas">
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
