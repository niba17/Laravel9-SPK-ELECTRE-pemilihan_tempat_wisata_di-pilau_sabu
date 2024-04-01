<?php

namespace App\Http\Controllers;

use App\Models\User;
use PHPUnit\Util\Type;
use App\Models\Kriteria;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\LokasiWisata;
use App\Models\Perhitungan;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;

class PerhitunganController extends Controller
{
    protected $perhitungan;
    public function __construct()
    {
        $this->perhitungan = new Perhitungan();
    }

    public function hasil(Type $var = null)
    {
        $validator = $this->perhitungan->validator();
        if ($validator[0] == false) {

            $akun = User::get();
            $lokasi_wisata = LokasiWisata::get();
            $kriteria = Kriteria::get();
            $sub_kriteria = SubKriteria::get();
            $kecamatan = Kecamatan::get();
            $kelurahan = Kelurahan::get();

            session()->forget(['succELECTREMessage']);

            Session::flash('errELECTREMessage', $validator[1]);

            return view('home', ['akun' => $akun, 'lokasi_wisata' => $lokasi_wisata, 'kecamatan' => $kecamatan, 'kelurahan' => $kelurahan, 'kriteria' => $kriteria, 'sub_kriteria' => $sub_kriteria]);

        } elseif ($validator[0] == true) {

            $electre = $this->perhitungan->electre();

            // dd($electre);

            $lokasi_wisata = LokasiWisata::with(['lokasi_wisata_sub_kriteria.kriteria', 'lokasi_wisata_sub_kriteria.sub_kriteria'])->get();
            $kriteria = Kriteria::get();

            Session::flash('succELECTREMessage', 'Berhasil menghitung ' . count($lokasi_wisata) . ' Lokasi Wisata!');

            session()->forget(['errELECTREMessage']);

            return view('perhitungan.perhitungan-hasil', ['lokasi_wisata' => $lokasi_wisata, 'kriteria' => $kriteria, 'electre' => $electre]);
        }

    }
}