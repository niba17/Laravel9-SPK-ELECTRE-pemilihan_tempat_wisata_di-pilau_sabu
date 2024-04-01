@extends('layouts.master')
@section('title', 'ELECTRE | Edit Lokasi Wisata')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Lokasi Wisata</h4>
                            {{-- <p class="card-description">
                            Basic form layout
                        </p> --}}
                            <form class="forms-sample" action="/lokasi_wisata-update/{{ $lokasi_wisata->id }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" name="nama" value="{{ $lokasi_wisata->nama }}">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-group col-lg-4">
                                        <label for="datepicker" class="form-label">Tanggal lahir</label>
                                        <div class="input-group date" id="datepicker">
                                            <input type="text"
                                                class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                name="tgl_lahir" value="{{ $lokasi_wisata->tgl_lahir }}" autocomplete="off">
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
                                    </div> --}}
                                    <div class="form-group col-lg-4">
                                        <label for="kecamatan_id_lokasi_wisata">Kecamatan</label>
                                        <select class="form-control @error('kecamatan_id') is-invalid @enderror"
                                            id="kecamatan_id_lokasi_wisata" name="kecamatan_id">
                                            <option value="" selected>Pilih Kecamatan</option>
                                            @foreach ($kecamatan as $item_kecamatan)
                                                <option value="{{ $item_kecamatan->id }}"
                                                    @if ($lokasi_wisata->kecamatan_id == $item_kecamatan->id) selected @endif>
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
                                        <label for="kelurahan_id_lokasi_wisata">Kelurahan</label>
                                        <select class="form-control @error('kelurahan_id') is-invalid @enderror"
                                            id="kelurahan_id_lokasi_wisata" name="kelurahan_id">
                                            <option value="" selected>Pilih Kelurahan</option>
                                            @foreach ($kecamatan as $item_kecamatan)
                                                @if ($lokasi_wisata->kecamatan_id == $item_kecamatan->id)
                                                    @if ($item_kecamatan->kecamatan_kelurahan !== null)
                                                        @foreach ($item_kecamatan->kecamatan_kelurahan as $item_kec_kel)
                                                            @if ($lokasi_wisata->kecamatan_id == $item_kec_kel->kecamatan_id)
                                                                <option value="{{ $item_kec_kel->kelurahan->id }}"
                                                                    @if ($lokasi_wisata->kelurahan_id == $item_kec_kel->kelurahan_id) selected @endif>
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
                                        <div class="d-flex align-items-center justify-content-between">
                                            <label for="desa_id_lokasi_wisata" class="mr-2">Desa</label>
                                            <div class="form-check form-check-flat form-check-primary my-0">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="check-desa">
                                                    Tanpa Kelurahan
                                                    <i class="input-helper"></i></label>
                                            </div>
                                        </div>
                                        <select class="form-control @error('desa_id') is-invalid @enderror"
                                            id="desa_id_lokasi_wisata" name="desa_id">
                                            <option value="" selected>Pilih Desa</option>
                                            @foreach ($kelurahan as $item_kelurahan)
                                                @if ($lokasi_wisata->kelurahan_id == $item_kelurahan->id)
                                                    @if ($item_kelurahan->kelurahan_desa !== null)
                                                        @foreach ($item_kelurahan->kelurahan_desa as $item_kel_des)
                                                            @if ($lokasi_wisata->kelurahan_id == $item_kel_des->kelurahan_id)
                                                                <option value="{{ $item_kel_des->desa->id }}"
                                                                    @if ($lokasi_wisata->desa_id == $item_kel_des->desa_id) selected @endif>
                                                                    {{ $item_kel_des->desa->nama }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('desa_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <a href="/lokasi_wisata_sub_kriteria" class="btn btn-outline-danger">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->

    @endsection
