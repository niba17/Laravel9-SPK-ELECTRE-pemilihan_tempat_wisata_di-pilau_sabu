@extends('layouts.master')
@section('title', 'ELECTRE | Tambah Relasi Kelurahan & Desa')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Relasi Kelurahan & Desa</h4>
                            {{-- <p class="card-description">
                            Basic form layout
                        </p> --}}
                            <form class="forms-sample" action="/kelurahan_desa-store" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="kelurahan_id">Kelurahan</label>
                                        <select class="form-control @error('kelurahan_id') is-invalid @enderror"
                                            id="kelurahan_id" name="kelurahan_id">
                                            <option selected disabled>Pilih Kelurahan ...</option>
                                            @foreach ($kelurahan as $item_kecamatan)
                                                <option value="{{ $item_kecamatan->id }}">
                                                    {{ $item_kecamatan->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kelurahan_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="desa_id">Desa</label>
                                        <select class="form-control @error('desa_id') is-invalid @enderror" id="desa_id"
                                            name="desa_id">
                                            <option selected disabled>Pilih Kelurahan terlebih dahulu ...</option>
                                        </select>
                                        @error('desa_id')
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
