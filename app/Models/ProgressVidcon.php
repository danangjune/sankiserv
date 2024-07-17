<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressVidcon extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_permohonan_vidcon',
        'tanggal',
        'jam',
        'keterangan'
    ];

    public function permohonanVidcon()
    {
        return $this->belongsTo(PermohonanVidcon::class, 'id_permohonan_vidcon');
    }
}
