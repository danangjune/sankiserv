<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PermohonanVidcon;

class PermohonanVidconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vidconData = [
            [
                'id_pemohon' => 21,
                'judul_vidcon' => 'Rapat Strategis',
                'tanggal_vidcon' => '2024-07-15',
                'waktu_vidcon' => '10:00:00',
                'lokasi_vidcon' => 'Ruang Rapat Utama',
                'peserta_vidcon' => 'Manajemen Utama',
                'dukungan_vidcon' => json_encode(['alat dan operator', 'link zoom']),
                'status_kegiatan' => 'pending',
            ],
            [
                'id_pemohon' => 24,
                'judul_vidcon' => 'Presentasi Rencana Kerja',
                'tanggal_vidcon' => '2024-07-16',
                'waktu_vidcon' => '09:00:00',
                'lokasi_vidcon' => 'Aula Pusat',
                'peserta_vidcon' => 'Tim Kerja',
                'dukungan_vidcon' => json_encode(['infrastruktur', 'link zoom']),
                'status_kegiatan' => 'proses',
            ],
            [
                'id_pemohon' => 21,
                'judul_vidcon' => 'Diskusi Perubahan Kebijakan',
                'tanggal_vidcon' => '2024-07-17',
                'waktu_vidcon' => '14:00:00',
                'lokasi_vidcon' => 'Ruang Diskusi B',
                'peserta_vidcon' => 'Staf Kebijakan',
                'dukungan_vidcon' => json_encode(['alat dan operator']),
                'status_kegiatan' => 'selesai',
            ],
            [
                'id_pemohon' => 26,
                'judul_vidcon' => 'Sosialisasi Program Baru',
                'tanggal_vidcon' => '2024-07-18',
                'waktu_vidcon' => '11:00:00',
                'lokasi_vidcon' => 'Aula Utama',
                'peserta_vidcon' => 'Tim Sosialisasi',
                'dukungan_vidcon' => json_encode(['link zoom']),
                'status_kegiatan' => 'pending',
            ],
            [
                'id_pemohon' => 25,
                'judul_vidcon' => 'Konsultasi Proyek',
                'tanggal_vidcon' => '2024-07-19',
                'waktu_vidcon' => '13:00:00',
                'lokasi_vidcon' => 'Ruang Konsultasi C',
                'peserta_vidcon' => 'Tim Proyek',
                'dukungan_vidcon' => json_encode(['alat dan operator', 'link zoom']),
                'status_kegiatan' => 'proses',
            ],
            [
                'id_pemohon' => 21,
                'judul_vidcon' => 'Rapat Evaluasi',
                'tanggal_vidcon' => '2024-07-20',
                'waktu_vidcon' => '15:00:00',
                'lokasi_vidcon' => 'Ruang Rapat Evaluasi',
                'peserta_vidcon' => 'Tim Evaluasi',
                'dukungan_vidcon' => json_encode(['infrastruktur']),
                'status_kegiatan' => 'selesai',
            ],
            [
                'id_pemohon' => 27,
                'judul_vidcon' => 'Diskusi Rencana Tindak Lanjut',
                'tanggal_vidcon' => '2024-07-21',
                'waktu_vidcon' => '16:00:00',
                'lokasi_vidcon' => 'Aula Rencana',
                'peserta_vidcon' => 'Tim Rencana',
                'dukungan_vidcon' => json_encode(['alat dan operator']),
                'status_kegiatan' => 'pending',
            ],
            [
                'id_pemohon' => 28,
                'judul_vidcon' => 'Presentasi Hasil Survey',
                'tanggal_vidcon' => '2024-07-22',
                'waktu_vidcon' => '17:00:00',
                'lokasi_vidcon' => 'Aula Presentasi',
                'peserta_vidcon' => 'Tim Survey',
                'dukungan_vidcon' => json_encode(['link zoom']),
                'status_kegiatan' => 'proses',
            ],
            [
                'id_pemohon' => 29,
                'judul_vidcon' => 'Rapat Pengembangan Sistem',
                'tanggal_vidcon' => '2024-07-23',
                'waktu_vidcon' => '18:00:00',
                'lokasi_vidcon' => 'Ruang Pengembangan',
                'peserta_vidcon' => 'Tim Pengembangan',
                'dukungan_vidcon' => json_encode(['alat dan operator', 'link zoom']),
                'status_kegiatan' => 'selesai',
            ],
            [
                'id_pemohon' => 30,
                'judul_vidcon' => 'Sosialisasi Kebijakan Baru',
                'tanggal_vidcon' => '2024-07-24',
                'waktu_vidcon' => '19:00:00',
                'lokasi_vidcon' => 'Aula Kebijakan',
                'peserta_vidcon' => 'Tim Kebijakan',
                'dukungan_vidcon' => json_encode(['infrastruktur']),
                'status_kegiatan' => 'pending',
            ],
        ];

        foreach ($vidconData as $vidcon) {
            PermohonanVidcon::create($vidcon);
        }
    }
}
