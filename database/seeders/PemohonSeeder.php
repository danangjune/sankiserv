<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pemohon;

class PemohonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pemohonData = [
            [
                'nama_pemohon' => 'Ahmad Fauzi',
                'nip_pemohon' => '1234500001',
                'opd_pemohon' => 'Diskominfo',
                'email_pemohon' => 'ahmad.fauzi@example.com',
            ],
            [
                'nama_pemohon' => 'Siti Aminah',
                'nip_pemohon' => '1234500002',
                'opd_pemohon' => 'Bappeda',
                'email_pemohon' => 'siti.aminah@example.com',
            ],
            [
                'nama_pemohon' => 'Budi Santoso',
                'nip_pemohon' => '1234500003',
                'opd_pemohon' => 'Kemenkes',
                'email_pemohon' => 'budi.santoso@example.com',
            ],
            [
                'nama_pemohon' => 'Dewi Lestari',
                'nip_pemohon' => '1234500004',
                'opd_pemohon' => 'Kemendikbud',
                'email_pemohon' => 'dewi.lestari@example.com',
            ],
            [
                'nama_pemohon' => 'Agus Wijaya',
                'nip_pemohon' => '1234500005',
                'opd_pemohon' => 'BPS',
                'email_pemohon' => 'agus.wijaya@example.com',
            ],
            [
                'nama_pemohon' => 'Nurul Hidayati',
                'nip_pemohon' => '1234500006',
                'opd_pemohon' => 'BKPM',
                'email_pemohon' => 'nurul.hidayati@example.com',
            ],
            [
                'nama_pemohon' => 'Joko Sutrisno',
                'nip_pemohon' => '1234500007',
                'opd_pemohon' => 'Kemenhub',
                'email_pemohon' => 'joko.sutrisno@example.com',
            ],
            [
                'nama_pemohon' => 'Sri Wahyuni',
                'nip_pemohon' => '1234500008',
                'opd_pemohon' => 'Kemenkeu',
                'email_pemohon' => 'sri.wahyuni@example.com',
            ],
            [
                'nama_pemohon' => 'Rudi Hartono',
                'nip_pemohon' => '1234500009',
                'opd_pemohon' => 'Kemenlu',
                'email_pemohon' => 'rudi.hartono@example.com',
            ],
            [
                'nama_pemohon' => 'Mega Putri',
                'nip_pemohon' => '1234500010',
                'opd_pemohon' => 'Kemenristek',
                'email_pemohon' => 'mega.putri@example.com',
            ],
        ];

        foreach ($pemohonData as $pemohon) {
            Pemohon::create($pemohon);
        }
    }
}
