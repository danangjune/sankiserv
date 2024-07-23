<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemohon extends Model
{
    use HasFactory;

    protected $table = 'pemohon';
    
    protected $primaryKey = 'id_pemohon';

    protected $fillable = [
        'id_user',
        'nip',
        'nik',
        'jabatan',
        'opd',
        'no_telepon',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
