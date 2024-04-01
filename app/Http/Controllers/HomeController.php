<?php

namespace App\Http\Controllers;

use App\Models\User;
use PHPUnit\Util\Type;
use App\Models\Kriteria;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Desa;
use App\Models\SubKriteria;
use App\Models\LokasiWisata;

class HomeController extends Controller
{
    public function index(Type $var = null)
    {
        $akun = User::get();
        $lokasi_wisata = LokasiWisata::get();
        $kriteria = Kriteria::get();
        $kecamatan = Kecamatan::get();
        $kelurahan = Kelurahan::get();
        $desa = Desa::get();
        // $tingkat = Tingkat::get();
        // $kelas = Kelas::get();
        $sub_kriteria = SubKriteria::get();

        session()->forget(['succELECTREMessage']);

        return view('home', ['akun' => $akun, 'lokasi_wisata' => $lokasi_wisata, 'kecamatan' => $kecamatan, 'kelurahan' => $kelurahan, 'desa' => $desa, 'kriteria' => $kriteria, 'sub_kriteria' => $sub_kriteria]);
    }
}