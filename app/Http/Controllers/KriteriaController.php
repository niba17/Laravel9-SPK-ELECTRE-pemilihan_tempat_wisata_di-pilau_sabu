<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Type;
use App\Models\LokasiWisata;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\KriteriaSubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KriteriaController extends Controller
{
    // public function index(Type $var = null)
    // {
    //     $kriteria = Kriteria::with(['kriteria_sub_kriteria'])->get();
    //     $sub_kriteria = SubKriteria::with(['kriteria_sub_kriteria'])->get();

    //     return view('kriteria', ['kriteria' => $kriteria, 'sub_kriteria' => $sub_kriteria]);
    // }

    public function create()
    {
        return view('add.kriteria-add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];

        $rules = [
            'nama' => 'unique:kriteria|max:100|required',
            'bobot_referensi' => 'gt:0|lte:1|required',
            'cost_benefit' => 'required',
            'bobot_perhitungan' => 'required'
        ];

        $messages = [
            'nama.unique' => 'Kriteria sudah ada!',
            'nama.max' => 'Kriteria tidak boleh lebih dari :max karakter!',
            'nama.required' => 'Kriteria wajib diisi!',
            'bobot_referensi.gt' => 'Bobot Referensi minimal adalah 0.1!',
            'bobot_referensi.lte' => 'Bobot Referensi maksimal adalah 1!',
            'bobot_referensi.required' => 'Bobot Referensi harus diisi!',
            'cost_benefit.required' => 'Cost / Benefit harus diisi!',
            'bobot_perhitungan.required' => 'Bobot Perhitungan harus diisi!',
        ];

        $request->validate($rules, $messages);

        $arrayAdd = [];
        $arrayAdd = $request;

        $kriteria = Kriteria::create($arrayAdd->all());

        if ($kriteria) {
            Session::flash('succMessage', 'Kriteria berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal ditambahkan!');
        }

        return redirect('/kriteria_sub_kriteria');
    }

    public function edit($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $c_b = ['Cost', 'Benefit'];
        $b_p = ['JSK', 'BSK'];
        return view('edit.kriteria-edit', ['kriteria' => $kriteria, 'c_b' => $c_b, 'b_p' => $b_p]);
    }

    public function update(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        $kriteria = Kriteria::findOrFail($id);

        if ($request->nama != $kriteria->nama) {
            $rules['nama'] = 'unique:kriteria|max:100|required';
            $messages['nama.unique'] = 'Kriteria Sudah ada!';
            $messages['nama.required'] = 'Kriteria wajib Diisi!';
            $messages['nama.max'] = 'Kriteria tidak boleh lebih dari :max karakter!';
        }

        if ($request->bobot_referensi != $kriteria->bobot_referensi) {
            $rules['bobot_referensi'] = 'gt:0|lte:1|required';
            $messages['bobot_referensi.gt'] = 'Bobot referensi minimal adalah 0.1!';
            $messages['bobot_referensi.lte'] = 'Bobot Referensi maksimal adalah 1!';
            $messages['bobot_referensi.required'] = 'Bobot Referensi harus diisi!';
        }

        if ($request->cost_benefit != $kriteria->cost_benefit) {
            $rules['cost_benefit'] = 'required';
            $messages['cost_benefit.required'] = 'Cost / Benefit harus diisi!';
        }

        if ($request->bobot_perhitungan != $kriteria->bobot_perhitungan) {
            $rules['bobot_perhitungan'] = 'required';
            $messages['bobot_perhitungan.required'] = 'Bobot Perhitungan harus diisi!';
        }

        $request->validate($rules, $messages);

        $arrayUp = [];
        $arrayUp = $request;

        $result = $kriteria->update($arrayUp->all());

        if ($result) {
            Session::flash('succMessage', 'Kriteria berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal diubah!');
        }

        return redirect('/kriteria_sub_kriteria');
    }

    // public function request()
    // {
    //     $kriteria = Kriteria::with(['sub_kriteria.bobot_siswa'])->get();
    //     return response()->json([$kriteria]);
    // }

    public function destroy($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $result = $kriteria->delete();

        if ($result) {
            Session::flash('succMessage', 'Kriteria berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal dihapus!');
        }

        return redirect('/kriteria_sub_kriteria');
    }

    public function request()
    {
        $kriteria = Kriteria::with(['kriteria_sub_kriteria.sub_kriteria'])->get();
        $sub_kriteria = SubKriteria::with(['kriteria_sub_kriteria.kriteria'])->get();

        return response()->json([$kriteria, $sub_kriteria]);
    }

    public function request_lokasi_wisata()
    {
        $kriteria = Kriteria::with(['kriteria_sub_kriteria.sub_kriteria'])->get();
        $sub_kriteria = SubKriteria::with(['kriteria_sub_kriteria.kriteria'])->get();
        $lokasi = LokasiWisata::with(['lokasi_wisata_sub_kriteria.kriteria', 'lokasi_wisata_sub_kriteria.sub_kriteria'])->get();
        $kriteria_sub_kriteria = KriteriaSubKriteria::with(['kriteria', 'sub_kriteria'])->get();

        return response()->json([$kriteria, $sub_kriteria, $lokasi, $kriteria_sub_kriteria]);
    }
}