<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Insert Provinsi
        $provinsi = Provinsi::create([
            'nama' => 'Sumatera Utara'
        ]);

        // 2. Insert Kota
        $kota = Kota::create([
            'nama' => 'Medan',
            'provinsi_id' => $provinsi->id
        ]);

        // 3. Insert Kecamatan
        $kecamatan = Kecamatan::create([
            'nama' => 'Medan Tembung',
            'kota_id' => $kota->id
        ]);

        // 4. Insert Kelurahan (Sidorejo Hilir yang mencakup Jalan Tuasan / Pancing)
        Kelurahan::create([
            'nama' => 'Sidorejo Hilir',
            'kecamatan_id' => $kecamatan->id
        ]);
    }
}
