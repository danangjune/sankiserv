<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanVidcon extends Model
{
    use HasFactory;
    protected $table = 'permohonan_vidcon';
    protected $primaryKey = 'id_permohonan_vidcon';

    // Define the relationship with the Pemohon model
    public function pemohon()
    {
        return $this->belongsTo(Pemohon::class, 'id_pemohon', 'id_pemohon');
    }
}
