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
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Download PDF Permohonan Vidcon</h3>
    </div>
    <div class="card-body">
        <p>Silakan unduh PDF permohonan Vidcon Anda di bawah ini sebagai lampiran yang perlu disertakan dalam pengajuan permohonan melalui ASN Digital.</p>
        <a href="{{ route('vidcon.download') }}" class="btn btn-purple">Unduh PDF</a>
    </div>
</div>

@include('layout.footer')