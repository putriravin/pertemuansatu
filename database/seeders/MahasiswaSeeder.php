<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Nilai;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        // Data Mahasiswa
        $mhs1 = Mahasiswa::create([
            'nama' => 'Putri Ravin Nauli',
            'nim' => '238160073',
            'alamat' => 'Jalan Pancing'
        ]);
        $mhs2 = Mahasiswa::create([
            'nama' => 'Budi Santoso',
            'nim' => '238160001',
            'alamat' => 'Medan'
        ]);

        // Data Matakuliah
        $mk1 = Matakuliah::create([
            'kode' => 'MK01',
            'nama' => 'Pemrograman Web II',
            'sks' => 3
        ]);
        $mk2 = Matakuliah::create([
            'kode' => 'MK02',
            'nama' => 'Basis Data',
            'sks' => 3
        ]);

        // Data Nilai
        Nilai::create([
            'mahasiswa_id' => $mhs1->id,
            'matakuliah_id' => $mk1->id,
            'nilai' => 85
        ]);
        Nilai::create([
            'mahasiswa_id' => $mhs1->id,
            'matakuliah_id' => $mk2->id,
            'nilai' => 90
        ]);
        Nilai::create([
            'mahasiswa_id' => $mhs2->id,
            'matakuliah_id' => $mk1->id,
            'nilai' => 78
        ]);
    }
}
