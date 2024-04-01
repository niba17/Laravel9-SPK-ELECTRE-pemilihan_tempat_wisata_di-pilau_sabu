<?php

namespace App\Http\Controllers;

use App\Models\LokasiWisata;
use App\Models\Kriteria;
use App\Models\LokasiWisataSubKriteria;
use App\Models\SubKriteria;
use App\Models\KriteriaSubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LokasiWisataSubKriteriaController extends Controller
{
    public function index()
    {
        $lokasi_wisata = LokasiWisata::with(['lokasi_wisata_sub_kriteria.kriteria', 'lokasi_wisata_sub_kriteria.sub_kriteria.kriteria_sub_kriteria', 'kecamatan', 'kelurahan', 'desa'])->get();
        $lokasi_wisata_sub_kriteria = SubKriteria::get();
        $kriteria_sub_kriteria = KriteriaSubKriteria::get();
        $kriteria = Kriteria::get();

        session()->forget(['succELECTREMessage', 'errELECTREMessage']);

        return view('lokasi_wisata_sub_kriteria', ['lokasi_wisata' => $lokasi_wisata, 'lokasi_wisata_sub_kriteria' => $lokasi_wisata_sub_kriteria, 'kriteria' => $kriteria, 'kriteria_sub_kriteria' => $kriteria_sub_kriteria]);
    }

    public function create()
    {
        $lokasi_wisata = LokasiWisata::get();
        return view('add.lokasi_wisata_sub_kriteria-add', ['lokasi_wisata' => $lokasi_wisata]);
    }

    public function store(Request $request)
    {
        $rules = [
            'lokasi_wisata_id' => 'required',
            'kriteria_id' => 'required',
            'sub_kriteria_id' => 'required',
        ];

        $messages = [
            'lokasi_wisata_id.required' => 'Lokasi Wisata wajib dipilih!',
            'kriteria_id.required' => 'Kriteria wajib dipilih!',
            'sub_kriteria_id.required' => 'Sub Kriteria wajib dipilih!',
        ];

        $request->validate($rules, $messages);

        $result = LokasiWisataSubKriteria::create($request->all());

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Relasi gagal ditambahkan!');
        }

        return redirect('/lokasi_wisata_sub_kriteria');
    }

    public function edit($id)
    {
        $lokasi_wisata = LokasiWisata::get();
        $kriteria = Kriteria::with(['kriteria_sub_kriteria.sub_kriteria', 'lokasi_wisata_sub_kriteria.sub_kriteria'])->get();
        $sub_kriteria = SubKriteria::with(['kriteria_sub_kriteria'])->get();
        $kriteria_sub_kriteria = KriteriaSubKriteria::get();
        $lokasi_wisata_sub_kriteria = LokasiWisataSubKriteria::with(['lokasi_wisata', 'sub_kriteria.kriteria_sub_kriteria'])->findOrFail($id);
        $lokasi_wisata_sub_kriteria_get = LokasiWisataSubKriteria::get();

        return view('edit.lokasi_wisata_sub_kriteria-edit', ['lokasi_wisata_sub_kriteria' => $lokasi_wisata_sub_kriteria, 'sub_kriteria' => $sub_kriteria, 'lokasi_wisata' => $lokasi_wisata, 'kriteria' => $kriteria, 'kriteria_sub_kriteria' => $kriteria_sub_kriteria, 'lokasi_wisata_sub_kriteria_get' => $lokasi_wisata_sub_kriteria_get]);
    }

    public function update(Request $request, $id)
    {
        $lokasi_wisata_sub_kriteria = LokasiWisataSubKriteria::findOrFail($id);
        // dd($request->all());
        $rules = [
            'lokasi_wisata_id' => 'required',
            'kriteria_id' => 'required',
            'sub_kriteria_id' => 'required',
        ];

        $messages = [
            'lokasi_wisata_id.required' => 'Lokasi Wisata wajib dipilih!',
            'kriteria_id.required' => 'Kriteria wajib dipilih!',
            'sub_kriteria_id.required' => 'Sub Kriteria wajib dipilih!',
        ];

        $request->validate($rules, $messages);

        $result = $lokasi_wisata_sub_kriteria->update($request->all());

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Relasi gagal diubah!');
        }

        return redirect('/lokasi_wisata_sub_kriteria');
    }

    public function destroy($id)
    {
        $lokasi_wisata_sub_kriteria = LokasiWisataSubKriteria::findOrFail($id);
        $result = $lokasi_wisata_sub_kriteria->delete();

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Relasi gagal dihapus!');
        }

        return redirect('/lokasi_wisata_sub_kriteria');
    }
}