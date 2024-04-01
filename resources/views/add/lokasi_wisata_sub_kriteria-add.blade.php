@extends('layouts.master')
@section('title', 'ELECTRE | Tambah Relasi Lokasi Wisata & Sub Kriteria')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Relasi Lokasi Wisata & Sub Kriteria</h4>
                            {{-- <p class="card-description">
                            Basic form layout
                        </p> --}}
                            <form class="forms-sample" action="/lokasi_wisata_sub_kriteria-store" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="lokasi_wisata_id">Lokasi Wisata</label>
                                        <select class="form-control @error('lokasi_wisata_id') is-invalid @enderror"
                                            id="lokasi_wisata_id_lokasi_wisata" name="lokasi_wisata_id">
                                            <option selected disabled>Pilih Lokasi Wisata ...</option>
                                            @foreach ($lokasi_wisata as $item_lokasi_wisata)
                                                <option value="{{ $item_lokasi_wisata->id }}">
                                                    {{ $item_lokasi_wisata->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('lokasi_wisata_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="kriteria_id">Kriteria</label>
                                        <select class="form-control @error('kriteria_id') is-invalid @enderror"
                                            id="kriteria_id_lokasi_wisata" name="kriteria_id">
                                            <option selected disabled>Pilih Lokasi Wisata terlebih dahulu ...</option>
                                        </select>
                                        @error('kriteria_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="sub_kriteria_id">Sub Kriteria</label>
                                        <select class="form-control @error('sub_kriteria_id') is-invalid @enderror"
                                            id="sub_kriteria_id" name="sub_kriteria_id">
                                            <option selected disabled>Pilih Kriteria terlebih dahulu ...</option>
                                        </select>
                                        @error('sub_kriteria_id')
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
