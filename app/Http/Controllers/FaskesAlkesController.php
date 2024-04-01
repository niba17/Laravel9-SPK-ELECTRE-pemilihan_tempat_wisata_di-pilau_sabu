<?php

namespace App\Http\Controllers;

use App\Models\Alkes;
use App\Models\Faskes;
use PHPUnit\Util\Type;
use App\Models\Puskesmas;
use App\Models\FaskesAlkes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FaskesAlkesController extends Controller
{
    public function index(Type $var = null)
    {
        $faskes = Faskes::with(['faskes_alkes.alkes'])->get();
        $alkes = Alkes::with(['faskes_alkes.faskes'])->get();

        return view('faskes_alkes', ['faskes' => $faskes, 'alkes' => $alkes]);
    }

    public function create()
    {
        $faskes = Faskes::all();
        $alkes = Alkes::all();

        return view('add.faskes_alkes-add', ['faskes' => $faskes, 'alkes' => $alkes]);
    }

    public function store(Request $request)
    {
        $rules = [];
        $messages = [];

        $rules['alkes_id'] = 'required';
        $messages['alkes_id.required'] = 'Alkes wajib dipilih!';
        $rules['faskes_id'] = 'required';
        $messages['faskes_id.required'] = 'Faskes wajib dipilih!';

        $request->validate($rules, $messages);

        $result = FaskesAlkes::create($request->all());

        if ($result) {
            Session::flash('succMessage', 'Alkes berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Alkes gagal ditambahkan!');
        }

        return redirect('/faskes_alkes');
    }

    public function edit($id)
    {
        $faskes_alkes = FaskesAlkes::findOrFail($id);
        $faskes = Faskes::get();
        $alkes = Alkes::get();

        return view('edit.faskes_alkes-edit', ['faskes_alkes' => $faskes_alkes, 'faskes' => $faskes, 'alkes' => $alkes]);
    }

    public function update(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        $faskes_alkes = FaskesAlkes::findOrFail($id);

        $rules['alkes_id'] = 'required';
        $messages['alkes_id.required'] = 'Alkes wajib dipilih!';

        if ($request->faskes_id !== $faskes_alkes->faskes_id) {
            $rules['faskes_id'] = 'required';
            $messages['faskes_id.required'] = 'Faskes wajib dipilih!';
        }

        $request->validate($rules, $messages);

        $result = $faskes_alkes->update($request->all());

        if ($result) {
            Session::flash('succMessage', 'Alkes berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Alkes gagal diubah!');
        }

        return redirect('/faskes_alkes');
    }

    public function destroy($id)
    {
        $faskes_alkes = FaskesAlkes::findOrFail($id);
        $result = $faskes_alkes->delete();

        if ($result) {
            Session::flash('succMessage', 'Alkes berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Alkes gagal dihapus!');
        }

        return redirect('/faskes_alkes');
    }

    public function request()
    {
        $faskes = Faskes::with(['alkes'])->get();
        return response()->json([$faskes]);
    }
}