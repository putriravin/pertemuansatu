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
        $matakuliah = "Aplikasi Berbasis Web II";
        return view('portfolio.pendidikan', compact('title', 'kampus', 'prodi', 'matakuliah'));
    }

    public function keahlian()
    {
        $title = "Keahlian";
        // Disesuaikan dengan materi RPS Aplikasi Berbasis Web II
        $skills = [
            "Konsep MVC (Model-View-Controller)",
            "Pengembangan CMS Sederhana",
            "Routing, Controller, dan Views",
            "Database Migration & ORM",
            "Sistem Autentikasi & Middleware",
            "Manajemen File Upload",
            "Pengembangan RESTful API"
        ];
        return view('portfolio.keahlian', compact('title', 'skills'));
    }
}
