<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Mahasiswa;

class NilaiController extends Controller
{
    public function index()
    {
        $dataNilai = Nilai::with(['mahasiswa', 'matakuliah'])->get();

        return view('datanilai', compact('dataNilai'));
    }

    public function showNilaiMahasiswa($mahasiswaId)
    {
        $mahasiswa = Mahasiswa::find($mahasiswaId);

        if (!$mahasiswa) {
            return view('nilai.show', ['mahasiswa' => null]);
        }

        $mahasiswa->load('nilais.matakuliah');
        return view('nilai.show', compact('mahasiswa'));
    }
}
