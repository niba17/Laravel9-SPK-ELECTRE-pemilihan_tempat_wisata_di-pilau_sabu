<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Type;
use App\Models\Tingkat;
use App\Models\Kelas;
use App\Models\Kecamatan;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Kelurahan;
use App\Models\LokasiWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LokasiWisataController extends Controller
{
    // public function index(Type $var = null)
    // {
    //     $siswa = Siswa::get();

    //     return view('siswa', ['siswa' => $siswa]);
    // }

    public function create()
    {
        // $tingkat = Tingkat::get();
        // $kelas = Kelas::get();
        $kecamatan = Kecamatan::get();
        $kelurahan = Kelurahan::get();

        return view('add.lokasi_wisata-add', ['kecamatan' => $kecamatan, 'kelurahan' => $kelurahan]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];

        $rules['nama'] = 'unique:lokasi_wisata|max:50|required';
        $messages['nama.unique'] = 'Nama Lokasi Wisata sudah ada!';
        $messages['nama.max'] = 'Nama Lokasi Wisata tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Nama Lokasi Wisata wajib diisi!';

        // $rules['nis'] = 'unique:siswa|max:50|required';
        // $messages['nis.unique'] = 'NIS sudah ada!';
        // $messages['nis.max'] = 'NIS tidak boleh lebih dari :max karakter!';
        // $messages['nis.required'] = 'NIS wajib diisi!';

        // $messages['jk'] = 'Jenis Kelamin wajib dipilih!';
        // $messages['jk.required'] = 'Jenis Kelamin dipilih!';

        // $rules['tgl_lahir'] = 'required';
        // $messages['tgl_lahir.required'] = 'Tanggal lahir wajib diisi!';

        // $rules['tingkat_id'] = 'required';
        // $messages['tingkat_id.required'] = 'Tingkat wajib dipilih!';

        // $rules['kelas_id'] = 'required';
        // $messages['kelas_id.required'] = 'Kelas wajib dipilih!';

        $rules['kecamatan_id'] = 'required';
        $messages['kecamatan_id.required'] = 'Kecamatan wajib dipilih!';

        // $rules['kelurahan_id'] = 'required';
        // $messages['kelurahan_id.required'] = 'Kelurahan wajib dipilih!';

        // $rules['desa_id'] = 'required';
        // $messages['desa_id.required'] = 'Desa wajib dipilih!';

        $request->validate($rules, $messages);

        $arrayAdd = [];
        $arrayAdd = $request;

        $kasus = LokasiWisata::create($arrayAdd->all());

        if ($kasus) {
            Session::flash('succMessage', 'Lokasi Wisata berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Lokasi Wisata gagal ditambahkan!');
        }

        return redirect('/lokasi_wisata_sub_kriteria');
    }

    public function edit($id)
    {
        // dd($id);
        $lokasi_wisata = LokasiWisata::findOrFail($id);
        // $tingkat = Tingkat::with(['tingkat_kelas.kelas'])->get();
        // $kelas = Kelas::get();
        $kecamatan = Kecamatan::get();
        $kelurahan = Kelurahan::get();
        $c_b = ['Cost', 'Benefit'];

        // dd($tingkat);

        return view('edit.lokasi_wisata-edit', ['lokasi_wisata' => $lokasi_wisata, 'kecamatan' => $kecamatan, 'kelurahan' => $kelurahan]);
    }

    public function update(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        $lokasi_wisata = LokasiWisata::findOrFail($id);

        if ($request->nama != $lokasi_wisata->nama) {
            $rules['nama'] = 'unique:lokasi_wisata|max:50|required';
            $messages['nama.unique'] = 'Nama Lokasi Wisata Sudah ada!';
            $messages['nama.required'] = 'Lokasi Wisata wajib Diisi!';
            $messages['nama.max'] = 'Nama Lokasi Wisata tidak boleh lebih dari :max karakter!';
        }

        $rules['kecamatan_id'] = 'required';
        $messages['kecamatan_id.required'] = 'Kecamatan wajib dipilih!';

        $rules['kelurahan_id'] = 'required';
        $messages['kelurahan_id.required'] = 'Kelurahan wajib diisi!';


        $request->validate($rules, $messages);

        $result = $lokasi_wisata->update($request->all());


        if ($result) {
            Session::flash('succMessage', 'Lokasi Wisata berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Lokasi Wisata gagal diubah!');
        }

        return redirect('/lokasi_wisata_sub_kriteria');
    }

    public function destroy($id)
    {
        $lokasi_wisata = LokasiWisata::findOrFail($id);
        $result = $lokasi_wisata->delete();

        if ($result) {
            Session::flash('succMessage', 'Lokasi Wisata berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Lokasi Wisata gagal dihapus!');
        }

        return redirect('/lokasi_wisata_sub_kriteria');
    }

    public function request()
    {
        $lokasi_wisata = LokasiWisata::with(['lokasi_wisata_sub_kriteria.sub_kriteria.kriteria_sub_kriteria'])->get();
        $kriteria = Kriteria::get();
        $sub_kriteria = SubKriteria::get();

        return response()->json([$lokasi_wisata, $kriteria, $sub_kriteria]);
    }
}