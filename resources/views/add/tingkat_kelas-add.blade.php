@extends('layouts.master')
@section('title', 'ELECTRE | Tambah Relasi Tingkat & Kelas')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Relasi Tingkat & Kelas</h4>
                            {{-- <p class="card-description">
                            Basic form layout
                        </p> --}}
                            <form class="forms-sample" action="/tingkat_kelas-store" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="tingkat_id">Tingkat</label>
                                        <select class="form-control @error('tingkat_id') is-invalid @enderror"
                                            id="tingkat_id" name="tingkat_id">
                                            <option selected disabled>Pilih Tingkat ...</option>
                                            @foreach ($tingkat as $item_tingkat)
                                                <option value="{{ $item_tingkat->id }}">
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

                                    <div class="form-group col-lg-6">
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
                                <a href="/tingkat_kelas" class="btn btn-outline-danger">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->

    @endsection
