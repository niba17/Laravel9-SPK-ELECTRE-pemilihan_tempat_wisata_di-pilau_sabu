<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\KecamatanKelurahan;
use App\Models\Kelurahan;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KecamatanKelurahanDesaController extends Controller
{
    public function index()
    {
        $kecamatan = Kecamatan::with(['kecamatan_kelurahan'])->get();
        $kelurahan = Kelurahan::with(['kelurahan_desa'])->get();
        $desa = Desa::with(['kelurahan_desa'])->get();

        session()->forget(['succELECTREMessage', 'errELECTREMessage']);

        return view('kecamatan_kelurahan_desa', ['kecamatan' => $kecamatan, 'kelurahan' => $kelurahan, 'desa' => $desa]);
    }
}