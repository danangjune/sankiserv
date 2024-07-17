<!DOCTYPE html>
<html>
<head>
    <title>Permohonan Vidcon PDF</title>
    <link rel="stylesheet" href="{{ public_path('css/pdf-style.css') }}">
</head>
<body>
    <div class="container">
        <img src="{{ public_path('img/logo.png') }}" alt="Logo" class="logo">
        <h1>Permohonan Vidcon</h1>
        <p>ID Pemohon: {{ $id_pemohon }}</p>
        <p>Judul Vidcon: {{ $judul_vidcon }}</p>
        <p>Tanggal Vidcon: {{ $tanggal_vidcon }}</p>
        <p>Waktu Vidcon: {{ $waktu_vidcon }}</p>
        <p>Lokasi Vidcon: {{ $lokasi_vidcon }}</p>
        <p>Peserta Vidcon: {{ $peserta_vidcon }}</p>
        {{-- <p>Dukungan Vidcon: {{ $dukungan_vidcon }}</p> --}}
    </div>
</body>
</html>
