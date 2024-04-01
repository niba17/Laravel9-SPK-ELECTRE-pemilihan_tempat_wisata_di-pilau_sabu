@extends('layouts.master')
@section('title', 'ELECTRE | Tambah Kriteria')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Kriteria</h4>
                            {{-- <p class="card-description">
                            Basic form layout
                        </p> --}}
                            <form class="forms-sample" action="/kriteria-store" method="post">
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
                                        <label for="bobot_referensi">Bobot Referensi</label>
                                        <input type="number"
                                            class="form-control @error('bobot_referensi') is-invalid @enderror"
                                            id="bobot_referensi" name="bobot_referensi" value="{{ old('bobot_referensi') }}"
                                            step="any">
                                        @error('bobot_referensi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="cost_benefit">Cost / Benefit</label>
                                        <select class="form-control @error('cost_benefit') is-invalid @enderror"
                                            name="cost_benefit">
                                            <option selected disabled>Pilih Cost / Benefit ...</option>
                                            <option value="Cost">Cost</option>
                                            <option value="Benefit">Benefit</option>
                                        </select>
                                        @error('cost_benefit')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="bobot_perhitungan">Bobot Perhitungan</label>
                                        <select class="form-control @error('bobot_perhitungan') is-invalid @enderror"
                                            name="bobot_perhitungan">
                                            <option selected disabled>Pilih Bobot Perhitungan ...</option>
                                            <option value="JSK">Jumlah Sub Kriteria</option>
                                            <option value="BSK">Bobot Sub Kriteria</option>
                                        </select>
                                        @error('bobot_perhitungan')
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
