<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanResetPassword extends Model
{
    use HasFactory;
    protected $table = 'permohonan_reset_passwords';
    protected $primaryKey = 'id_permohonan_reset_password';

    protected $fillable = [
        'id_permohonan_reset_password',
        'id_pemohon',
        'email_reset',
        'alasan_reset',
        'status_reset',
        'id_user',
        
    ];

    // Define the relationship with the Pemohon model
    public function pemohon()
    {
        return $this->belongsTo(Pemohon::class, 'id_pemohon', 'id_pemohon');
    }

    public function progressResetpaswwords()
    {
        return $this->hasMany(ProgressResetPassword::class, 'id_permohonan_reset_password');
    } 
}
