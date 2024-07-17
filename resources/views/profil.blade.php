@include('frontlayout.header')
@include('frontlayout.navbar')

<body>
    <section class="content">
        <div class="mt-2 ml-5 mr-5">
            <div class="text-center mt-4 mb-4">
                <h3><b>PROFIL</b></h3>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-header p-2" style="background-image: url({{asset('logos')}}/nap.png);"></div>
                        <div class="card-body box-profile">
                            <div>
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Struktur Organisasi</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Tugas dan Fungsi</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer p-2" style="background-image: url({{asset('logos')}}/nap.png);"></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header p-2" style="background-image: url({{asset('logos')}}/nap.png);"></div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <img class="container" src="{{asset('logos')}}/bagansanki.jpeg" alt="User profile picture">
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">

                                </div>
                                <!-- /.tab-pane -->

                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                        <div class="card-footer p-2" style="background-image: url({{asset('logos')}}/nap.png);"></div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</body>

@include('frontlayout.footer')