<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PermohonanResetPassword;

class PermohonanResetPasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        for ($i = 1; $i <= 1; $i++) {
            $id_pemohon = '1';
            $email_reset = 'ayu@kedirikota.go.id';
            $alasan_reset = 'lupa password';
            $status_reset = 'setuju';
            $id_user = '1';
            PermohonanResetPassword::create([
                'id_pemohon' => $id_pemohon,
                'email_reset' => $email_reset,
                'alasan_reset' => $alasan_reset,
                'status_reset' => $status_reset,
                'id_user' => $id_user,
            ]);
        }
    }
}


