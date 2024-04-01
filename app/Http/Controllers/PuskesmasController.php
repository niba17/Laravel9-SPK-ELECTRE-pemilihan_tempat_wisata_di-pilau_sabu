<?php

namespace App\Http\Controllers;

use App\Models\Faskes;
use PHPUnit\Util\Type;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PuskesmasController extends Controller
{
    public function index(Type $var = null)
    {
        $puskesmas = Puskesmas::with(['kecamatan', 'kelurahan'])->get();
        // dd($puskesmas);
        return view('puskesmas', ['puskesmas' => $puskesmas]);
    }

    public function create()
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $puskesmas = Puskesmas::all();
        $faskes = Faskes::all();

        return view('add.puskesmas-add', ['kecamatan' => $kecamatan, 'kelurahan' => $kelurahan, 'puskesmas' => $puskesmas, 'faskes' => $faskes]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'nama' => 'required|unique:puskesmas|max:50',
            'kecamatan_id' => 'required',
            'kelurahan_id' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'gambar' => 'mimes:jpg,jpeg|image|max:2048'
        ];

        $messages = [
            'nama.unique' => 'Nama Puskesmas sudah ada!',
            'nama.max' => 'Nama Puskesmas tidak boleh lebih dari :max karakter!',
            'nama.required' => 'Nama wajib diisi!',
            'kecamatan_id.required' => 'Kecamatan wajib dipilih!',
            'kelurahan_id.required' => 'Kelurahan wajib dipilih!',
            'lat.required' => 'Latitude wajib diisi!',
            'lng.required' => 'Longitude wajib diisi!',
            // 'gambar.required' => 'Gambar wajib dipilih!',
            'gambar.mimes' => 'Format file tidak sesuai, format yang diijinkan : jpg, jpeg!',
            'gambar.image' => 'Format file tidak sesuai, format yang diijinkan : jpg, jpeg!',
            'gambar.max' => 'File tidak boleh lebih dari :max kb!'
        ];

        $arrayCreate = $request->all();

        if ($request->gambar != null) {
            $newName = '';
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $newName = $request->nama . '_gambar_' . now()->timestamp . '.' . $extension;
            $request->file('gambar')->storeAs('images', $newName);

            $arrayCreate['gambar'] = $newName;
        }

        // dd($array);

        $request->validate($rules, $messages);

        $result = Puskesmas::create($arrayCreate);

        if ($result) {
            Session::flash('succMessage', 'Puskesmas berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Puskesmas gagal ditambahkan!');
        }

        return redirect('/puskesmas');
    }

    public function edit($id)
    {
        $puskesmas = Puskesmas::with(['kecamatan', 'kelurahan'])->findOrFail($id);
        $faskes = Faskes::with(['alkes'])->get();

        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();

        return view('edit.puskesmas-edit', ['puskesmas' => $puskesmas, 'kecamatan' => $kecamatan, 'kelurahan' => $kelurahan, 'faskes' => $faskes]);
    }

    public function update(Request $request, $id)
    {
        $puskesmas = Puskesmas::findOrFail($id);

        $rules = [];

        $messages = [];

        if ($request->nama != $puskesmas->nama) {
            $rules['nama'] = 'unique:puskesmas|max:50|required';
            $messages['nama.unique'] = 'Nama Puskesmas Sudah ada!';
            $messages['nama.required'] = 'Nama Puskesmas wajib Diisi!';
            $messages['nama.max'] = 'Nama Puskesmas tidak boleh lebih dari :max karakter!';
        }

        if ($request->kecamatan_id != $puskesmas->kecamatan_id) {
            $rules['kecamatan_id'] = 'required';
            $messages['kecamatan_id.required'] = 'Kecamatan wajib Diisi!';
        }

        if ($request->kelurahan_id != $puskesmas->kelurahan_id) {
            $rules['kelurahan_id'] = 'required';
            $messages['kelurahan_id.required'] = 'Kecamatan wajib Diisi!';
        }

        if ($request->lat != $puskesmas->lat) {
            $rules['lat'] = 'required';
            $messages['lat.required'] = 'Latitude wajib Diisi!';
        }

        if ($request->lng != $puskesmas->lng) {
            $rules['lng'] = 'required';
            $messages['lng.required'] = 'Longitude wajib Diisi!';
        }

        if ($request->lng != $puskesmas->lng) {
            $rules['lng'] = 'required';
            $messages['lng.required'] = 'Longitude wajib Diisi!';
        }

        $arrayUpdate = $request->all();

        if ($request->gambar != $puskesmas->gambar) {
            $rules['gambar'] = 'mimes:jpg,jpeg|image|max:2048';
            $messages['gambar.required'] = 'Longitude wajib Diisi!';

            $messages['gambar.mimes'] = 'Format file tidak sesuai, format yang diijinkan : jpg, jpeg!';
            $messages['gambar.image'] = 'Format file tidak sesuai, format yang diijinkan : jpg, jpeg!';
            $messages['gambar.max'] = 'File tidak boleh lebih dari :max kb!';

            if ($request->gambar != null) {
                $newName = '';
                $extension = $request->file('gambar')->getClientOriginalExtension();
                $newName = $request->nama . '_gambar_' . now()->timestamp . '.' . $extension;
                $request->file('gambar')->storeAs('images', $newName);

                $arrayUpdate['gambar'] = $newName;
            }
        }

        $request->validate($rules, $messages);

        $puskesmasUp = $puskesmas->update($arrayUpdate);

        if ($puskesmasUp) {
            Session::flash('succMessage', 'Puskesmas berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Puskesmas gagal diubah!');
        }

        return redirect('/puskesmas');
    }

    public function destroy($id)
    {
        $puskesmas = Puskesmas::findOrFail($id);
        $puskesmas = $puskesmas->delete();

        if ($puskesmas) {
            Session::flash('succMessage', 'Puskesmas berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Puskesmas gagal dihapus!');
        }

        return redirect('/puskesmas');
    }
}