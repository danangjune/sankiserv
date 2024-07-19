<?php

namespace Database\Seeders;

use App\Models\Sop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 1; $i++) {
            $uraian = 'SOP';
            $file = 'kediri';
            Sop::create([
                'uraian' => $uraian,
                'file' => $file
            ]);
        }
    }
}
