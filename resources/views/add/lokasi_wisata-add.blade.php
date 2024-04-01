@extends('layouts.master')
@section('title', 'ELECTRE | Tambah Lokasi Wisata')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Lokasi Wisata</h4>
                            <hr>
                            {{-- <p class="card-description">
                            Basic form layout
                        </p> --}}
                            <form class="forms-sample" action="/lokasi_wisata-store" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" name="nama" value="{{ old('nama') }}">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="kecamatan_id">Kecamatan</label>
                                        <select class="form-control @error('kecamatan_id') is-invalid @enderror"
                                            id="kecamatan_id_lokasi_wisata" name="kecamatan_id">
                                            <option selected>Pilih Kecamatan ...</option>
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
                                    <div class="form-group col-lg-6">
                                        <label for="kelurahan_id_lokasi_wisata">Kelurahan</label>
                                        <select class="form-control @error('kelurahan_id') is-invalid @enderror"
                                            id="kelurahan_id_lokasi_wisata" name="kelurahan_id">
                                            <option selected>Pilih Kecamatan terlebih dahulu ...</option>
                                        </select>
                                        @error('kelurahan_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
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
                                            <option selected>Pilih Kelurahan terlebih dahulu ...</option>
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
        <script></script>
    @endsection
