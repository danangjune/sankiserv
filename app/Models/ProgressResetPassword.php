<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressResetPassword extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_permohonan_reset_password',
        'tanggal',
        'jam',
        'keterangan'
    ];
    public function permohonanResetPassword()
    {
        return $this->belongsTo(PermohonanResetPassword::class, 'id_permohonan_reset_password');
    }
}
