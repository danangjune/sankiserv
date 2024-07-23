<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanVidcon extends Model
{
    use HasFactory;

    protected $table = 'permohonan_vidcon';
    
    protected $primaryKey = 'id_permohonan_vidcon';

    protected $fillable = [
        'id_pemohon',
        'alamat_opd',
        'dasar_pelaksanaan',
        'nomer_surat',
        'acara',
        'hari_tanggal',
        'waktu',
        'tempat',
        'peserta',
        'bentuk_dukungan',
        'nama_kepala',
        'nip_kepala',
        'pangkat_kepala',
    ];

    // Define the relationship with the Pemohon model
    public function pemohon()
    {
        return $this->belongsTo(Pemohon::class, 'id_pemohon', 'id_pemohon');
    }

    public function progressVidcons()
    {
        return $this->hasMany(ProgressVidcon::class, 'id_permohonan_vidcon');
    }
}
