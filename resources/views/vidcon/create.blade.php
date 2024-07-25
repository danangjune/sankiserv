@include('frontlayout.header')
@include('frontlayout.navbar')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center mt-4 mb-4">
                <h3>PERMOHONAN VIDCON</h3>
            </div>
            <div class="card">
                <div class="card-header text-center">Form Permohonan Vidcon - Sanki Support</div>
                <div class="card-body">
                    <form action="{{ route('vidcon.storeDocx') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_pemohon">Nama Pemohon</label>
                            <input type="text" class="form-control" id="nama_pemohon" name="nama_pemohon" value="{{ Auth::user()->name }}" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="opd">Leading Sektor / OPD Pemohon</label>
                            <input type="text" class="form-control" id="opd" name="opd" value="{{ Auth::user()->pemohon->opd ?? '' }}" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="alamat_opd">Alamat OPD</label>
                            <textarea class="form-control" id="alamat_opd" name="alamat_opd"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="dasar_pelaksanaan">Dasar Pelaksanaan Vidcon</label>
                            <textarea class="form-control" id="dasar_pelaksanaan" name="dasar_pelaksanaan"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="nomor_surat">Nomer Surat</label>
                            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat">
                        </div>
                        
                        <div class="form-group">
                            <label for="acara">Acara Vidcon</label>
                            <input type="text" class="form-control" id="acara" name="acara">
                        </div>
                        
                        <div class="form-group">
                            <label for="hari_tanggal">Hari dan Tanggal</label>
                            <input type="date" class="form-control" id="hari_tanggal" name="hari_tanggal">
                        </div>
                        
                        <div class="form-group">
                            <label for="waktu">Waktu</label>
                            <input type="time" class="form-control" id="waktu" name="waktu">
                        </div>
                        
                        <div class="form-group">
                            <label for="tempat">Tempat</label>
                            <input type="text" class="form-control" id="tempat" name="tempat">
                        </div>
                        
                        <div class="form-group">
                            <label for="peserta">Peserta Vidcon</label>
                            <input type="text" class="form-control" id="peserta" name="peserta">
                        </div>
                            
                        <div class="form-group">
                            <label for="dukungan_vidcon">Bentuk Dukungan</label>
                            <div class="checkbox">
                                <label class="mr-1"><input type="checkbox" name="dukungan_vidcon[]" value="link zoom"> Link Zoom  </label>
                                <label class="mr-1"><input type="checkbox" name="dukungan_vidcon[]" value="alat vidcon dan operator"> Alat Vidcon dan Operator  </label>
                                <label class="mr-1"><input type="checkbox" name="dukungan_vidcon[]" value="jaringan internet"> Jaringan Internet  </label>
                                <label class="mr-1"><input type="checkbox" name="dukungan_vidcon[]" value="internet on demand"> Internet On Demand  </label>
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

                        <div class="form-group">
                            <label for="keterangan">Keterangan Tambahan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                        </div>
                        
                        <button type="submit" class="btn" style="background-color: #36CCD0;"><b class="text-light">Submit</b></button>
                    </form>
                </div>
         
                <!-- <div class="card-footer" style="background-image: url({{asset('logos')}}/nap.png);"></div> -->
            </div>
        </div>
    </div>
</div>

@include('frontlayout.footer')
