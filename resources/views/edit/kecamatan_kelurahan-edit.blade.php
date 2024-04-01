@extends('layouts.master')
@section('title', 'ELECTRE | Edit Relasi Kecamatan & Kelurahan')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Relasi Kecamatan & Kelurahan</h4>
                            {{-- <p class="card-description">
                        Basic form layout
                    </p> --}}
                            <form class="forms-sample" action="/kecamatan_kelurahan-update/{{ $kecamatan_kelurahan->id }}"
                                method="post">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="kecamatan_id">Kecamatan</label>
                                        <input type="text"
                                            class="form-control @error('kecamatan_id') is-invalid @enderror"
                                            id="kecamatan_id" value="{{ $kecamatan_kelurahan->kecamatan->nama }}" disabled
                                            aria-describedby="emailHelp">
                                        @error('kecamatan_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <input type="hidden" class="form-control" id="kecamatan_id" name="kecamatan_id"
                                            value="{{ $kecamatan_kelurahan->kecamatan->id }}">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="kelurahan_id">Kelurahan</label>
                                        <select class="form-control @error('kelurahan_id') is-invalid @enderror"
                                            id="kelurahan_id" name="kelurahan_id">
                                            <option selected disabled>Pilih Kecamatan terlebih dahulu ...</option>
                                            @foreach ($kelurahan as $item_kelurahan)
                                                @php
                                                    $temp = false;
                                                @endphp
                                                <option value="{{ $item_kelurahan->id }}"
                                                    @foreach ($item_kelurahan->kecamatan_kelurahan as $item_kec_kel) 
                                @if (
                                    $item_kec_kel->kecamatan_id == $kecamatan_kelurahan->kecamatan_id &&
                                        $item_kec_kel->kelurahan_id == $kecamatan_kelurahan->kelurahan_id)
                                selected
                                @endif 
                                @if (
                                    $item_kec_kel->kecamatan_id == $kecamatan_kelurahan->kecamatan_id &&
                                        $item_kec_kel->kelurahan_id != $kecamatan_kelurahan->kelurahan_id)
                                @php
                                 $temp=true   
                                @endphp
                                class="text-danger" disabled
                                @endif @endforeach>
                                                    {{ $item_kelurahan->nama }} @if ($temp == true)
                                                        (sudah dipilih!)
                                                    @endif
                                                </option>
                                            @endforeach
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
