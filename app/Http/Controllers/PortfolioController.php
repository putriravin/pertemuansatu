<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function home()
    {
        $title = "Home Portfolio";
        return view('portfolio.home', compact('title'));
    }

    public function profil()
    {
        $title = "Profil";
        $nama = "Putri Ravin Nauli";
        $npm = "238160073";
        return view('portfolio.profil', compact('title', 'nama', 'npm'));
    }

    public function pendidikan()
    {
        $title = "Pendidikan";
        $kampus = "Universitas Medan Area";
        $prodi = "Teknik Informatika";
        return view('portfolio.pendidikan', compact('title', 'kampus', 'prodi'));
    }

    public function keahlian()
    {
        $title = "Keahlian";
        $skills = ["HTML", "CSS", "PHP", "Laravel", "JavaScript"];
        return view('portfolio.keahlian', compact('title', 'skills'));
    }
}
