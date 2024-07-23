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
                    <h1>Standar Operasional Prosedur</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">SOP</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <!-- <div class="card"> -->

    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Daftar SOP</h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <div class="d-flex justify-content-end mb-2">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#saldoawalModalTambah"><i class="fa fa-plus"></i>
                    Tambah Data
                </button>
                <div class="modal fade" id="saldoawalModalTambah" tabindex="-1" aria-labelledby="saldoawalModalLabelTambah" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="#" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="saldoawalModalLabelIdEdit">
                                        Tambah
                                        Data
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <h6>Saldo Awal</h6>
                                    <hr class="bg-navy">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <select class="form-select" id="kdrekid" name="kdrekid" aria-label="Default select example">
                                                <option selected>Pilih Kode Rekening
                                                </option>
                                                <option value="">
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control @error('debit') is-invalid @enderror" id="debit" name="debit" placeholder="Debit*">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control @error('kredit') is-invalid @enderror" id="kredit" name="kredit" placeholder="Kredit*">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button on type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" value="submit" class="btn btn-outline-primary ml-1">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table id="example1" class="table table-sm table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Uraian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sops as $key => $sop)
                    <tr>
                        <!-- Data per baris -->
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $sop->uraian}}</td>
                        <td>
                            <button class="btn btn-sm btn-primary status-btn" data-id="" data-status="proses"><i class="fa fa-eye" aria-hidden="true"></i></button>
                            <button class="btn btn-sm btn-warning status-btn" data-id="" data-status="selesai"><i class="fa fa-edit" aria-hidden="true"></i></button>
                            <span class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5"> Data Kosong </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
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
<!-- <script>
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
    }); -->
</script>