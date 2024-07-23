@include('frontlayout.header')
@include('frontlayout.navbar')

<body>
    <section class="container">
        <div class="text-center mt-4 mb-4">
            <h3><b>STANDAR OPERASIONAL PROSEDUR (SOP)</b></h3>
        </div>
        <div class="card">
            <div class="card-header" style="background-image: url({{asset('logos')}}/nap.png);"></div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>SOP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sops as $key => $sop)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $sop->uraian}}</td>
                            <td><button type="button" class="btn btn-primary mr-1">Lihat</button><button type="button" class="btn btn-warning">Unduh</button></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5"> Data Kosong </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer" style="background-image: url({{asset('logos')}}/nap.png);"></div>
            <!-- /.card-body -->
        </div>
    </section>
</body>

@include('frontlayout.footer')