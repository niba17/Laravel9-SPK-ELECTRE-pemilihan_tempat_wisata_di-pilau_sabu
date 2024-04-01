<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\Tahun;
use PHPUnit\Util\Type;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Puskesmas;
use Illuminate\Http\Request;

class PetaController extends Controller
{
    public function index(Type $var = null)
    {
        $puskesmas = Puskesmas::with(['kecamatan', 'kelurahan'])->get();
        // dd($puskesmas);
        $kecamatan = Kecamatan::with(['kelurahan'])->get();
        $kelurahan = Kelurahan::with(['kecamatan'])->get();

        return view('map.peta', ['puskesmas' => $puskesmas, 'kecamatan' => $kecamatan, 'kelurahan' => $kelurahan]);
    }

    public function request()
    {
        $kasus = Kasus::with(['kelurahan.puskesmas.kecamatan'])->get();
        $kecamatan = Kecamatan::with(['puskesmas.kelurahan.kasus'])->get();
        return response()->json([$kasus, $kecamatan]);
    }
}