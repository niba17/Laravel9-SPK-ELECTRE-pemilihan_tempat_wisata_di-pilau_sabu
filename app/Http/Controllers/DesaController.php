<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Type;
use App\Models\Desa;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DesaController extends Controller
{
    // public function index(Type $var = null)
    // {
    //     $desa = Desa::with(['kelurahan'])->get();
    //     $kelurahan = Kelurahan::with(['desa'])->get();

    //     session()->forget('errMessage');
    //     return view('desa', ['desa' => $desa, 'kelurahan' => $kelurahan]);
    // }

    public function create()
    {
        return view('add.desa-add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];
        $rules['nama'] = 'unique:desa|max:50|required';
        $messages['nama.unique'] = 'Nama desa sudah ada!';
        $messages['nama.max'] = 'Nama desa tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Nama desa wajib diisi!';

        $request->validate($rules, $messages);

        $result = Desa::create($request->all());

        if ($result) {
            Session::flash('succMessage', 'Desa berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Desa gagal ditambahkan!');
        }

        return redirect('/kecamatan_kelurahan_desa');
    }

    public function edit($id)
    {
        $desa = Desa::findOrFail($id);

        return view('edit.desa-edit', ['desa' => $desa]);
    }

    public function update(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        $desa = Desa::findOrFail($id);

        if ($request->nama != $desa->nama) {
            $rules['nama'] = 'unique:desa|max:50|required';
            $messages['nama.unique'] = 'Nama Desa Sudah ada!';
            $messages['nama.required'] = 'Desa wajib Diisi!';
            $messages['nama.max'] = 'Nama Desa tidak boleh lebih dari :max karakter!';
        }

        $request->validate($rules, $messages);

        $result = $desa->update($request->all());


        if ($result) {
            Session::flash('succMessage', 'Desa berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Desa gagal diubah!');
        }

        return redirect('/kecamatan_kelurahan_desa');
    }

    public function destroy($id)
    {
        $desa = Desa::findOrFail($id);
        $result = $desa->delete();

        if ($result) {
            Session::flash('succMessage', 'Desa berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Desa gagal dihapus!');
        }

        return redirect('/kecamatan_kelurahan_desa');
    }

    public function request()
    {
        $desa = Desa::with(['kelurahan_desa.kelurahan'])->get();

        return response()->json([$desa]);
    }
}