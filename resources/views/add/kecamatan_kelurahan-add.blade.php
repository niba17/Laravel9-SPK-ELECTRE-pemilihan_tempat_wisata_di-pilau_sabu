@extends('layouts.master')
@section('title', 'ELECTRE | Tambah Relasi Kecamatan & Kelurahan')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Relasi Kecamatan & Kelurahan</h4>
                            {{-- <p class="card-description">
                            Basic form layout
                        </p> --}}
                            <form class="forms-sample" action="/kecamatan_kelurahan-store" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="kecamatan_id">Kecamatan</label>
                                        <select class="form-control @error('kecamatan_id') is-invalid @enderror"
                                            id="kecamatan_id" name="kecamatan_id">
                                            <option selected disabled>Pilih Kecamatan ...</option>
                                            @foreach ($kecamatan as $item_kecamatan)
                                                <option value="{{ $item_kecamatan->id }}">
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

                                    <div class="form-group col-lg-6">
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
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <a href="/kecamatan_kelurahan_desa" class="btn btn-outline-danger">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->

    @endsection
