<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\LokasiWisataKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LokasiWisataKriteriaController extends Controller
{
    public function create()
    {
        $kriteria = Kriteria::get();

        session()->forget(['succELECTREMessage', 'errELECTREMessage']);

        return view('add.lokasi_wisata_kriteria-add', ['kriteria' => $kriteria]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'kriteria_id' => 'required',
            'lokasi_wisata_id' => 'required',
            'bobot' => 'required|gte:1|numeric',
        ];

        $messages = [
            'kriteria_id.required' => 'Kriteria wajib dipilih!',

            'lokasi_wisata_id.required' => 'Lokasi Wisata wajib dipilih!',

            'bobot.required' => 'Bobot wajib diisi!',
            'bobot.gte' => 'Bobot mimal adalah 0!',
        ];

        $request->validate($rules, $messages);

        // if (is_numeric($request->range_awal) == false) {
        //     $error = \Illuminate\Validation\ValidationException::withMessages([
        //         'range_awal' => ['Range awal harus berupa angka!'],
        //     ]);
        //     throw $error;
        // }

        $result = LokasiWisataKriteria::create($request->all());

        if ($result) {
            Session::flash('succMessage', 'Kriteria berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal ditambahkan!');
        }

        return redirect('/lokasi_wisata');
    }

    public function edit($id)
    {
        $lokasi_wisata_kriteria = LokasiWisataKriteria::with(['lokasi_wisata', 'kriteria'])->findOrFail($id);
        $kriteria = Kriteria::get();
        // $sub_kriteria = SubKriteria::with(['lokasi_wisata_kriteria.lokasi_wisata'])->get();

        return view('edit.lokasi_wisata_kriteria-edit', ['lokasi_wisata_kriteria' => $lokasi_wisata_kriteria, 'kriteria' => $kriteria]);
    }

    public function update(Request $request, $id)
    {
        $lokasi_wisata_kriteria = LokasiWisataKriteria::findOrFail($id);

        $rules = [
            'kriteria_id' => 'required',
            'lokasi_wisata_id' => 'required',
            'bobot' => 'required|gte:1|numeric',
        ];

        $messages = [
            'kriteria_id.required' => 'Kriteria wajib dipilih!',

            'lokasi_wisata_id.required' => 'Lokasi Wisata wajib dipilih!',

            'bobot.required' => 'Bobot wajib diisi!',
            'bobot.gte' => 'Bobot mimal adalah 0!',
        ];

        $request->validate($rules, $messages);

        $result = $lokasi_wisata_kriteria->update($request->all());

        if ($result) {
            Session::flash('succMessage', 'Kriteria berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal diubah!');
        }

        return redirect('/lokasi_wisata');
    }

    public function destroy($id)
    {
        $lokasi_wisata_kriteria = LokasiWisataKriteria::findOrFail($id);
        $result = $lokasi_wisata_kriteria->delete();

        if ($result) {
            Session::flash('succMessage', 'Kriteria berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal dihapus!');
        }

        return redirect('/lokasi_wisata');
    }
}