    @include('layout.header')

    <style>
        .card {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }
        .content-wrapper {
            padding: 20px;
            /* margin-top: 20px; */
        }

        .btn-purple {
            background-color: #6f42c1; /* Warna ungu yang Anda pilih */
            color: #fff; /* Warna teks putih atau sesuai kebutuhan */
            border-color: #6f42c1; /* Warna border yang sama dengan background */
        }

        .btn-purple:hover {
            background-color: #5b2b96; /* Warna ungu saat hover */
            border-color: #5b2b96; /* Warna border saat hover */
        }
    </style>
    

@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Form Permohonan Vidcon</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('vidcon.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="id_pemohon">ID Pemohon</label>
                    <select class="form-control select2" id="id_pemohon" name="id_pemohon" required>
                        <option value="">Pilih Pemohon</option>
                        @foreach($pemohon as $p)
                            <option value="{{ $p->id_pemohon }}">{{ $p->nama_pemohon }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="judul_vidcon">Judul Vidcon</label>
                    <input type="text" class="form-control" id="judul_vidcon" name="judul_vidcon" required>
                </div>
                <div class="form-group">
                        <label for="tanggal_vidcon">Tanggal Vidcon</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tanggal_vidcon" required/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="waktu_vidcon">Waktu Vidcon</label>
                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#timepicker" name="waktu_vidcon" required/>
                            <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-clock"></i></div>
                            </div>
                        </div>
                    </div>
                
                <div class="form-group">
                    <label for="lokasi_vidcon">Lokasi Vidcon</label>
                    <input type="text" class="form-control" id="lokasi_vidcon" name="lokasi_vidcon" required>
                </div>
                <div class="form-group">
                    <label for="peserta_vidcon">Peserta Vidcon</label>
                    <input type="text" class="form-control" id="peserta_vidcon" name="peserta_vidcon" required>
                </div>
                <div class="form-group">
                    <label for="dukungan_vidcon">Dukungan Vidcon</label>
                    <div class="select2-purple">
                        <select class="form-control select2" multiple="multiple" id="dukungan_vidcon" name="dukungan_vidcon[]" data-placeholder="Pilih Dukungan" data-dropdown-css-class="select2-purple" style="width: 100%;">
                            <option value="link zoom">Link Zoom</option>
                            <option value="alat dan operator">Alat dan Operator</option>
                            <option value="internet on demand">Internet on Demand</option>
                            <option value="jaringan">Jaringan</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-purple btn-block">Submit</button>
            </form>
        </div>
        <div class="card-footer">
            <!-- Optional footer -->
        </div>
    </div>

    <!-- Include necessary libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Initialize date and time pickers -->
<script>
    $(function () {
        // Date picker
        $('#reservationdate').datetimepicker({
            format: 'YYYY-MM-DD',
            icons: {
                time: 'fa fa-clock',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-calendar-check-o',
                clear: 'fa fa-trash',
                close: 'fa fa-times'
            }
        });

        // Time picker
        $('#timepicker').datetimepicker({
            format: 'HH:mm:ss',
            icons: {
                time: 'fa fa-clock',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-calendar-check-o',
                clear: 'fa fa-trash',
                close: 'fa fa-times'
            }
        });

        // Form submission
        $('#vidconForm').submit(function () {
            // Optionally, you can add additional validation here if needed
            return true; // Ensure form submission
        });
    });
</script>

@include('layout.footer')
