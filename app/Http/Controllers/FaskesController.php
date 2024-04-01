<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Type;
use App\Models\Faskes;
use App\Models\Alkes;
use App\Models\Puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FaskesController extends Controller
{
    public function index(Type $var = null)
    {
        $faskes = Faskes::with(['puskesmas', 'alkes'])->get();
        $alkes = Alkes::with(['puskesmas', 'faskes'])->get();
        // dd($faskes);
        // session()->forget('errMessage');
        return view('faskes', ['faskes' => $faskes, 'alkes' => $alkes]);
    }

    public function create()
    {
        $faskes = Faskes::all();
        return view('add.faskes-add', ['faskes' => $faskes]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];
        $rules['nama'] = 'unique:faskes|max:50|required';
        $messages['nama.unique'] = 'Nama sudah ada!';
        $messages['nama.max'] = 'Nama tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Nama wajib diisi!';

        $request->validate($rules, $messages);

        $result = Faskes::create($request->all());

        if ($result) {
            Session::flash('succMessage', 'Faskes berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Faskes gagal ditambahkan!');
        }

        return redirect('/faskes_alkes');
    }

    public function edit($id)
    {
        $faskes = Faskes::findOrFail($id);

        return view('edit.faskes-edit', ['faskes' => $faskes]);
    }

    public function update(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        $faskes = Faskes::findOrFail($id);

        if ($request->nama != $faskes->nama) {
            $rules['nama'] = 'unique:faskes|max:50|required';
            $messages['nama.unique'] = 'Nama Faskes Sudah ada!';
            $messages['nama.required'] = 'Faskes wajib Diisi!';
            $messages['nama.max'] = 'Nama Faskes tidak boleh lebih dari :max karakter!';
        }

        $request->validate($rules, $messages);

        $result = $faskes->update($request->all());


        if ($result) {
            Session::flash('succMessage', 'Faskes berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Faskes gagal diubah!');
        }

        return redirect('/faskes_alkes');
    }

    public function destroy($id)
    {
        $faskes = Faskes::findOrFail($id);
        $result = $faskes->delete();

        if ($result) {
            Session::flash('succMessage', 'Faskes berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Faskes gagal dihapus!');
        }

        return redirect('/faskes_alkes');
    }

    public function request()
    {
        $faskes = Faskes::with(['alkes'])->get();
        return response()->json([$faskes]);
    }
}