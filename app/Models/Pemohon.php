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
        'jabatan_pemohon',
        'opd_pemohon',
        'no_telepon',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
