<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Type;
use App\Models\Faskes;
use App\Models\Alkes;
use App\Models\Puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AlkesController extends Controller
{
    public function index()
    {
        $alkes = Alkes::with(['faskes_alkes'])->get();

        // session()->forget('errMessage');
        return view('alkes', ['alkes' => $alkes]);
    }

    public function create()
    {
        $puskesmas = Puskesmas::all();
        $faskes = Faskes::all();

        return view('add.alkes-add', ['faskes' => $faskes, 'puskesmas' => $puskesmas]);
    }

    // public function validator_create(Request $request)
    // {
    //     $rules = [];
    //     $messages = [];
    //     $rules['nama'] = 'unique:alkes|max:50|required';
    //     $messages['nama.unique'] = 'Nama sudah ada!';
    //     $messages['nama.max'] = 'Nama tidak boleh lebih dari :max karakter!';
    //     $messages['nama.required'] = 'Nama wajib diisi!';

    //     $request->validate($rules, $messages);

    //     $alkes = Alkes::get();
    //     // dd($request->all());
    //     $valid = true;
    //     foreach ($alkes as $key => $value) {
    //         if ($request->nama == $value->nama && $request->faskes_id == $value->faskes_id) {
    //             $valid = false;
    //         }
    //     }

    //     if ($valid == true) {
    //         return $this->store($request);
    //     } else {
    //         $error = \Illuminate\Validation\ValidationException::withMessages([
    //             'nama' => ['Alkes sudah ada!']
    //         ]);
    //         throw $error;
    //     }

    // }

    public function store(Request $request)
    {
        $rules = [];
        $messages = [];

        $rules['nama'] = 'unique:alkes|max:50|required';
        $messages['nama.unique'] = 'Nama sudah ada!';
        $messages['nama.max'] = 'Nama tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Nama wajib diisi!';

        $request->validate($rules, $messages);

        $result = Alkes::create($request->all());

        if ($result) {
            Session::flash('succMessage', 'Alkes berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Alkes gagal ditambahkan!');
        }

        return redirect('/alkes');
    }

    public function edit($id)
    {
        // $faskes = Faskes::all();
        $alkes = Alkes::with('faskes')->findOrFail($id);
        // $kelurahanArr = [];
        // $kelurahanArr = $alkes;
        $faskes = Faskes::all();

        return view('edit.alkes-edit', ['alkes' => $alkes, 'faskes' => $faskes]);
    }

    // public function validator_update(Request $request, $id)
    // {
    //     // dd($request->all());
    //     $rules = [];
    //     $messages = [];

    //     $alkes = Alkes::findOrFail($id);

    //     if ($alkes->nama != $request->nama) {
    //         $rules['nama'] = 'max:50|required';
    //         $messages['nama.max'] = 'Nama tidak boleh lebih dari :max karakter!';
    //         $messages['nama.required'] = 'Nama wajib diisi!';
    //     }

    //     $request->validate($rules, $messages);

    //     $arrayUp = [];
    //     $arrayUp = $request;

    //     // if ($alkes->bobot != $request->bobot) {
    //     //     $arrayUp['bobot'] = $arrayUp['bobot'] / 100;
    //     // }

    //     $alkes_all = Alkes::get();

    //     $valid = true;
    //     if ($alkes->nama != $request->nama) {
    //         foreach ($alkes_all as $key => $value) {
    //             if ($request->nama == $value->nama && $request->faskes_id == $value->faskes_id) {
    //                 $valid = false;
    //             }
    //         }
    //     }
    //     if ($alkes->faskes_id != $request->faskes_id) {
    //         foreach ($alkes_all as $key => $value) {
    //             if ($request->nama == $value->nama && $request->faskes_id == $value->faskes_id) {
    //                 $valid = false;
    //             }
    //         }
    //     }

    //     if ($valid == true) {
    //         return $this->update($arrayUp, $id);
    //     } else {
    //         $error = \Illuminate\Validation\ValidationException::withMessages([
    //             'nama' => ['Alkes sudah ada!']
    //         ]);
    //         throw $error;
    //     }

    // }

    public function update(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        $alkes = Alkes::findOrFail($id);

        if ($request->nama != $alkes->nama) {
            $rules['nama'] = 'unique:alkes|max:50|required';
            $messages['nama.unique'] = 'Nama Alkes Sudah ada!';
            $messages['nama.required'] = 'Alkes wajib Diisi!';
            $messages['nama.max'] = 'Nama Alkes tidak boleh lebih dari :max karakter!';
        }

        $request->validate($rules, $messages);

        $result = $alkes->update($request->all());


        if ($result) {
            Session::flash('succMessage', 'Alkes berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Alkes gagal diubah!');
        }

        return redirect('/alkes');
    }

    public function destroy($id)
    {
        $alkes = Alkes::findOrFail($id);
        $result = $alkes->delete();

        if ($result) {
            Session::flash('succMessage', 'Alkes berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Alkes gagal dihapus!');
        }

        return redirect('/alkes');
    }

    public function request_faskes_alkes()
    {
        $alkes = Alkes::with(['faskes_alkes.faskes'])->get();
        $faskes = Faskes::with(['faskes_alkes.alkes'])->get();
        return response()->json([$alkes, $faskes]);
    }

    public function request_puskes_alkes()
    {
        $alkes = Alkes::with(['puskes_alkes.puskesmas'])->get();
        $puskes = Puskesmas::with(['puskes_alkes.alkes'])->get();
        return response()->json([$alkes, $puskes]);
    }
}