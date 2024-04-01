@extends('layouts.master')
@section('title', 'ELECTRE | Tambah Siswa')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Siswa</h4>
                            {{-- <p class="card-description">
                            Basic form layout
                        </p> --}}
                            <form class="forms-sample" action="/siswa-update/{{ $siswa->id }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" name="nama" value="{{ old('nama') }}">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="nis">NIS</label>
                                        <input type="text" class="form-control @error('nis') is-invalid @enderror"
                                            id="nis" name="nis" value="{{ old('nis') }}">
                                        @error('nis')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="jk">Jenis Kelamin</label>
                                        <select class="form-control @error('jk') is-invalid @enderror" id="jk"
                                            name="jk">
                                            <option selected disabled>Pilih Jenis Kelamin ...</option>
                                            <option value="Laki - laki">
                                                Laki - laki
                                            </option>
                                            <option value="Perempuan">
                                                Perempuan
                                            </option>
                                        </select>
                                        @error('jk')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="datepicker" class="form-label">Tanggal lahir</label>
                                        {{-- <div class="col-sm-4"> --}}
                                        <div class="input-group date" id="datepicker">
                                            <input type="text"
                                                class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                name="tgl_lahir" value="{{ old('tgl_lahir') }}" autocomplete="off">
                                            <span class="input-group-append">
                                                <span class="input-group-text bg-white">
                                                    <i class="fa fa-calendar" style="height: 20px"></i>
                                                </span>
                                            </span>
                                            @error('tgl_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="kecamatan_id">Kecamatan</label>
                                        <select class="form-control @error('kecamatan_id') is-invalid @enderror"
                                            id="kecamatan_id_siswa" name="kecamatan_id">
                                            <option selected disabled>Pilih Kecamatan ...</option>
                                            @foreach ($kecamatan as $item_kecamatan)
                                                <option value="{{ $item_kecamatan->id }}">{{ $item_kecamatan->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kecamatan_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="kelurahan_id">Kelurahan</label>
                                        <select class="form-control @error('kelurahan_id') is-invalid @enderror"
                                            id="kelurahan_id" name="kelurahan_id">
                                            <option selected disabled>Pilih Kecamatan terlebih dahulu ...</option>
                                        </select>
                                        @error('kelurahan_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="tingkat_id">Tingkat</label>
                                        <select class="form-control @error('tingkat_id') is-invalid @enderror"
                                            id="tingkat_id_siswa" name="tingkat_id">
                                            <option selected disabled>Pilih Tingkat ...</option>
                                            @foreach ($tingkat as $item_tingkat)
                                                <option value="{{ $item_tingkat->id }}">{{ $item_tingkat->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('tingkat_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="kelas_id">Kelas</label>
                                        <select class="form-control @error('kelas_id') is-invalid @enderror" id="kelas_id"
                                            name="kelas_id">
                                            <option selected disabled>Pilih Tingkat terlebih dahulu ...</option>
                                        </select>
                                        @error('kelas_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <a href="/kriteria_sub_kriteria" class="btn btn-outline-danger">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->

    @endsection
