<?php

namespace App\Http\Controllers;

use App\Models\Alkes;
use App\Models\Faskes;
use PHPUnit\Util\Type;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Puskesmas;
use App\Models\PuskesAlkes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PuskesAlkesController extends Controller
{
    public function index(Type $var = null)
    {
        $puskesmas = Puskesmas::with(['puskes_alkes.alkes'])->get();
        $alkes = Alkes::with(['puskes_alkes.puskesmas', 'faskes'])->get();
        $puskes_alkes = PuskesAlkes::with(['puskesmas'])->get();
        // dd($alkes);
        // session()->forget('errMessage');
        return view('puskes_alkes', ['puskesmas' => $puskesmas, 'alkes' => $alkes, 'puskes_alkes' => $puskes_alkes]);
    }

    public function create(Type $var = null)
    {
        $puskesmas = Puskesmas::with(['puskes_alkes'])->get();
        $faskes = Faskes::with(['faskes_alkes'])->get();
        $alkes = Alkes::with(['faskes_alkes'])->get();

        return view('add.puskes_alkes-add', ['puskesmas' => $puskesmas, 'faskes' => $faskes, 'alkes' => $alkes]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];

        $rules['alkes_id'] = 'required';
        $messages['alkes_id.required'] = 'Alkes wajib dipilih!';
        $rules['puskesmas_id'] = 'required';
        $messages['puskesmas_id.required'] = 'Puskesmas wajib dipilih!';

        $request->validate($rules, $messages);

        $result = PuskesAlkes::create($request->all());

        if ($result) {
            Session::flash('succMessage', 'Alkes berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Alkes gagal ditambahkan!');
        }

        return redirect('/puskes_alkes');
    }

    public function edit($id)
    {
        $puskes_alkes = PuskesAlkes::findOrFail($id);
        $puskesmas = Puskesmas::get();
        $alkes = Alkes::get();

        return view('edit.puskes_alkes-edit', ['puskes_alkes' => $puskes_alkes, 'alkes' => $alkes, 'puskesmas' => $puskesmas]);
    }

    public function update(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        $puskes_alkes = PuskesAlkes::findOrFail($id);
        // dd($request->all());
        $rules['alkes_id'] = 'required';
        $messages['alkes_id.required'] = 'Alkes wajib dipilih!';

        if ($request->puskesmas_id !== $puskes_alkes->puskesmas_id) {
            $rules['puskesmas_id'] = 'required';
            $messages['puskesmas_id.required'] = 'Puskesmas wajib dipilih!';
        }

        $request->validate($rules, $messages);

        $result = $puskes_alkes->update($request->all());

        if ($result) {
            Session::flash('succMessage', 'Alkes berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Alkes gagal diubah!');
        }

        return redirect('/puskes_alkes');
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

        return redirect('/puskes_alkes');
    }

    public function request()
    {
        $faskes = Faskes::with(['alkes'])->get();
        return response()->json([$faskes]);
    }
}