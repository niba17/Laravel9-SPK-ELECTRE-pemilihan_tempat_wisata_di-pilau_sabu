@extends('layouts.master')
@section('title', 'ELECTRE | Edit Kecamatan')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Kecamatan</h4>
                            {{-- <p class="card-description">
                        Basic form layout
                    </p> --}}
                            <form class="forms-sample" action="/kecamatan-update/{{ $kecamatan->id }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" name="nama" value="{{ $kecamatan->nama }}">
                                        @error('nama')
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
