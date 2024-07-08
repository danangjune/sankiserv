@include('layout.header')

<!-- Navbar -->
@include('layout.navbar')
<!-- /.navbar -->

<!-- Main Sidebar Container -->
@include('layout.sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Permohonan Vidcon</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Permohonan Vidcon</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <div class="card">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Permohonan Masuk / Perlu Di Approve</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <!-- Tabel data permohonan vidcon -->
                                    <!-- Kolom-kolom data -->
                                    @foreach($permohonanVidcon as $vidcon)
                                    <tr>
                                        <!-- Data per baris -->
                                        <td>{{ $vidcon->id_permohonan_vidcon }}</td>
                                        <td>{{ $vidcon->pemohon->nama_pemohon }}</td>
                                        <td>{{ $vidcon->pemohon->opd_pemohon }}</td>
                                        <td>{{ $vidcon->judul_vidcon }}</td>
                                        <td>{{ $vidcon->tanggal_vidcon }}</td>
                                        <td>{{ $vidcon->waktu_vidcon }}</td>
                                        <td>{{ $vidcon->lokasi_vidcon }}</td>
                                        <td>{{ $vidcon->peserta_vidcon }}</td>
                                        <!-- Badge dukungan vidcon -->
                                        <td>
                                            @php
                                            $dukungan = json_decode($vidcon->dukungan_vidcon, true);
                                            @endphp
                                            @if(is_array($dukungan))
                                            @foreach($dukungan as $item)
                                            @php
                                            $badgeClass = '';
                                            switch ($item) {
                                            case 'alat dan operator':
                                            $badgeClass = 'badge-primary';
                                            break;
                                            case 'link zoom':
                                            $badgeClass = 'badge-secondary';
                                            break;
                                            case 'internet on demand':
                                            $badgeClass = 'badge-success';
                                            break;
                                            case 'jaringan':
                                            $badgeClass = 'badge-warning';
                                            break;
                                            default:
                                            $badgeClass = 'badge-primary';
                                            break;
                                            }
                                            @endphp
                                            <span class="badge {{ $badgeClass }}">{{ $item }}</span>
                                            @endforeach
                                            @endif
                                        </td>
                                        <!-- Tombol status kegiatan -->
                                        <td>
                                            @if($vidcon->status_kegiatan == 'pending')
                                            <button class="btn btn-danger status-btn" data-id="{{ $vidcon->id_permohonan_vidcon }}" data-status="proses">Proses Vidcon</button>
                                            @elseif($vidcon->status_kegiatan == 'proses')
                                            <button class="btn btn-warning status-btn" data-id="{{ $vidcon->id_permohonan_vidcon }}" data-status="selesai">Selesai Vidcon</button>
                                            @elseif($vidcon->status_kegiatan == 'selesai')
                                            <span class="btn btn-success">Vidcon Terlaksana</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>
@include('layout.footer')

<!-- Modal Konfirmasi -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Perubahan Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Konfirmasi Permohonan Vidcon?
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" id="btnBatal" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btnUbah">Ya, Konfirmasi</button>
            </div>
        </div>
    </div>
</div>

<!-- Script jQuery -->
<script>
    $(document).ready(function() {
        $('.status-btn').on('click', function() {
            var id = $(this).data('id');
            var status = $(this).data('status');
            var url = '';

            if (status === 'proses') {
                url = '/admin/permohonan-vidcon/' + id + '/proses';
            } else if (status === 'selesai') {
                url = '/admin/permohonan-vidcon/' + id + '/selesai';
            }

            // Tampilkan modal konfirmasi
            $('#confirmationModal').modal('show');

            // Handle tombol 'Ya, Ubah'
            $('#btnUbah').on('click', function() {
                $.ajax({
                    url: url,
                    type: 'PATCH',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        location.reload();
                    },
                    error: function(response) {
                        alert('Failed to update status');
                    }
                });

                // Tutup modal setelah proses selesai
                $('#confirmationModal').modal('hide');
            });

            // Handle tombol 'Batal'
            $('#btnBatal').on('click', function() {
                $('#confirmationModal').modal('hide');
            });
        });
    });
</script>