<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\KelurahanDesa;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelurahanDesaController extends Controller
{
    // public function index()
    // {
    //     $kelurahan = Kelurahan::with(['kelurahan_desa'])->get();
    //     $desa = Desa::get();

    //     session()->forget(['succELECTREMessage', 'errELECTREMessage']);

    //     return view('kelurahan_desa', ['kelurahan' => $kelurahan, 'desa' => $desa]);
    // }

    public function create()
    {
        $kelurahan = Kelurahan::get();
        $desa = Desa::get();

        return view('add.kelurahan_desa-add', ['kelurahan' => $kelurahan, 'desa' => $desa]);
    }

    public function store(Request $request)
    {
        $rules = [
            'kelurahan_id' => 'required',
            'desa_id' => 'required',
        ];

        $messages = [
            'kelurahan_id.required' => 'Kelurahan wajib dipilih!',
            'desa_id.required' => 'Desa wajib dipilih!',
        ];

        $request->validate($rules, $messages);

        $result = KelurahanDesa::create($request->all());

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Relasi gagal ditambahkan!');
        }

        return redirect('/kecamatan_kelurahan_desa');
    }

    public function edit($id)
    {
        $kelurahan = Kelurahan::get();
        $desa = Desa::get();
        $kelurahan_desa = KelurahanDesa::with(['kelurahan', 'desa'])->findOrFail($id);

        return view('edit.kelurahan_desa-edit', ['kelurahan_desa' => $kelurahan_desa, 'desa' => $desa, 'kelurahan' => $kelurahan]);
    }

    public function update(Request $request, $id)
    {
        $kelurahan_desa = KelurahanDesa::findOrFail($id);

        $rules = [
            'kelurahan_id' => 'required',
            'desa_id' => 'required',
        ];

        $messages = [
            'kelurahan_id.required' => 'Kelurahan wajib dipilih!',
            'desa_id.required' => 'Desa wajib dipilih!',
        ];

        $request->validate($rules, $messages);

        $result = $kelurahan_desa->update($request->all());

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Relasi gagal diubah!');
        }

        return redirect('/kecamatan_kelurahan_desa');
    }

    public function destroy($id)
    {
        $kelurahan_desa = KelurahanDesa::findOrFail($id);
        $result = $kelurahan_desa->delete();

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Relasi gagal dihapus!');
        }

        return redirect('/kecamatan_kelurahan_desa');
    }
}