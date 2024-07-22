@include('frontlayout.header')
@include('frontlayout.navbar')

<style>
    .logo {
        transition: transform 0.2s ease;
        /* Efek transisi untuk perubahan */
    }

    .logo:hover {
        transform: scale(1.1);
        /* Contooh: Memperbesar gambar saat hover */
    }
</style>

<body>
    <section class="container">
        <div class="text-center mt-4 mb-4">
            <h3><b>SANKI SUPPORT</b></h3>
        </div>
        <div class="card-deck container mt-2 mb-2">
            <a href="{{ route('vidcon.create') }}" class="card logo" style="box-shadow:none; border:none;">
                <img class="card-body" src="{{asset('logos')}}/lay-vidco.gif" alt="Card image cap">
            </a>
            <a href="" class="card logo" style="box-shadow:none; border:none">
                <img class="card-body" src="{{asset('logos')}}/lay-penerbitan-tte.gif" alt="Card image cap">
            </a>
            <a href="" class="card logo" style="box-shadow:none; border:none">
                <img class="card-body" src="{{asset('logos')}}/lay-pembaharuan-tte.gif" alt="Card image cap">
            </a>
            <a href="" class="card logo" style="box-shadow:none; border:none">
                <img class="card-body" src="{{asset('logos')}}/lay-lupa-passprase.gif" alt="Card image cap">
            </a>
            <a href="" class="card logo" style="box-shadow:none; border:none">
                <img class="card-body" src="{{asset('logos')}}/lay-insiden.gif" alt="Card image cap">
            </a>
        </div>
        <div class="card-deck container mt-2 mb-2">
            <a href="" class="card logo" style="box-shadow:none; border:none">
                <img class="card-body" src="{{asset('logos')}}/lay-penerbitan-email.gif" alt="Card image cap">
            </a>
            <a href="" class="card logo" style="box-shadow:none; border:none">
                <img class="card-body" src="{{asset('logos')}}/lay-lupa-pass-email.gif" alt="Card image cap">
            </a>
            <a href="" class="card logo" style="box-shadow:none; border:none">
                <img class="card-body" src="{{asset('logos')}}/lay-ssl.gif" alt="Card image cap">
            </a>
            <a href="" class="card logo" style="box-shadow:none; border:none">
                <img class="card-body" src="{{asset('logos')}}/lay-pabx.gif" alt="Card image cap">
            </a>
            <a href="" class="card logo" style="box-shadow:none; border:none">
                <img class="card-body" src="{{asset('logos')}}/lay-cctv.gif" alt="Card image cap">
            </a>
        </div>
    </section>
</body>

@include('frontlayout.footer')