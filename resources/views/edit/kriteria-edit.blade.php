@extends('layouts.master')
@section('title', 'ELECTRE | Edit Kriteria')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Kriteria</h4>
                            {{-- <p class="card-description">
                        Basic form layout
                    </p> --}}
                            <form class="forms-sample" action="/kriteria-update/{{ $kriteria->id }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" name="nama" value="{{ $kriteria->nama }}">
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
                                            id="bobot_referensi" name="bobot_referensi"
                                            value="{{ $kriteria->bobot_referensi }}" step="any">
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
                                            {{-- <option selected disabled>Pilih Cost / Benefit ...</option> --}}
                                            @foreach ($c_b as $item_c_b)
                                                <option value="{{ $item_c_b }}"
                                                    @if ($item_c_b == $kriteria->cost_benefit) selected @endif>{{ $item_c_b }}
                                                </option>
                                            @endforeach
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
                                            {{-- <option selected disabled>Pilih Bobot Perhitungan ...</option> --}}
                                            @foreach ($b_p as $item_b_p)
                                                <option value="{{ $item_b_p }}"
                                                    @if ($item_b_p == $kriteria->bobot_perhitungan) selected @endif>
                                                    @if ($item_b_p == 'JSK')
                                                        Jumlah Sub Kriteria
                                                    @elseif($item_b_p == 'BSK')
                                                        Bobot Sub Kriteria
                                                    @endif
                                                </option>
                                            @endforeach
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
