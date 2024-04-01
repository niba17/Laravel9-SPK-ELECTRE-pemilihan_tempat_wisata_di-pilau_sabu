@extends('layouts.master')
@section('title', 'ELECTRE | Edit Siswa')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Siswa</h4>
                            {{-- <p class="card-description">
                            Basic form layout
                        </p> --}}
                            <form class="forms-sample" action="/siswa-update/{{ $siswa->id }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" name="nama" value="{{ $siswa->nama }}">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="nis">NIS</label>
                                        <input type="text" class="form-control @error('nis') is-invalid @enderror"
                                            id="nis" name="nis" value="{{ $siswa->nis }}">
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
                                            @foreach ($jk as $item_jk)
                                                <option value="{{ $item_jk }}"
                                                    @if ($item_jk == $siswa->jk) selected @endif>
                                                    {{ $item_jk }}
                                                </option>
                                            @endforeach
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
                                                name="tgl_lahir" value="{{ $siswa->tgl_lahir }}" autocomplete="off">
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
                                            @foreach ($kecamatan as $item_kecamatan)
                                                <option value="{{ $item_kecamatan->id }}"
                                                    @if ($siswa->kecamatan_id == $item_kecamatan->id) selected @endif>
                                                    {{ $item_kecamatan->nama }}
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
                                            @foreach ($kecamatan as $item_kecamatan)
                                                @if ($siswa->kecamatan_id == $item_kecamatan->id)
                                                    @if ($item_kecamatan->kecamatan_kelurahan !== null)
                                                        @foreach ($item_kecamatan->kecamatan_kelurahan as $item_kec_kel)
                                                            @if ($siswa->kecamatan_id == $item_kec_kel->kecamatan_id)
                                                                <option value="{{ $item_kec_kel->kelurahan->id }}"
                                                                    @if ($siswa->kelurahan_id == $item_kec_kel->kelurahan_id) selected @endif>
                                                                    {{ $item_kec_kel->kelurahan->nama }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endif
                                            @endforeach
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
                                            @foreach ($tingkat as $item_tingkat)
                                                <option
                                                    value="{{ $item_tingkat->id }}"@if ($siswa->tingkat_id == $item_tingkat->id) selected @endif>
                                                    {{ $item_tingkat->nama }}
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
                                            @foreach ($tingkat as $item_tingkat)
                                                @if ($siswa->tingkat_id == $item_tingkat->id)
                                                    @if ($item_tingkat->tingkat_kelas !== null)
                                                        @foreach ($item_tingkat->tingkat_kelas as $item_ting_kel)
                                                            @if ($siswa->tingkat_id == $item_ting_kel->tingkat_id)
                                                                <option value="{{ $item_ting_kel->kelas->id }}"
                                                                    @if ($siswa->kelas_id == $item_ting_kel->kelas_id) selected @endif>
                                                                    {{ $item_ting_kel->kelas->nama }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('kelas_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <a href="/siswa_sub_kriteria" class="btn btn-outline-danger">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->

    @endsection
