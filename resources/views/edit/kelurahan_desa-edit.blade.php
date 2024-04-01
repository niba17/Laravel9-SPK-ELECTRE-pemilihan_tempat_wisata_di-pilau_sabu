@extends('layouts.master')
@section('title', 'ELECTRE | Edit Relasi Kelurahan & Desa')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Relasi Kelurahan & Desa</h4>
                            {{-- <p class="card-description">
                        Basic form layout
                    </p> --}}
                            <form class="forms-sample" action="/kelurahan_desa-update/{{ $kelurahan_desa->id }}"
                                method="post">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="kelurahan_id">Kelurahan</label>
                                        <input type="text"
                                            class="form-control @error('kelurahan_id') is-invalid @enderror"
                                            id="kelurahan_id" value="{{ $kelurahan_desa->kelurahan->nama }}" disabled
                                            aria-describedby="emailHelp">
                                        @error('kelurahan_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <input type="hidden" class="form-control" id="kelurahan_id" name="kelurahan_id"
                                            value="{{ $kelurahan_desa->kelurahan->id }}">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="desa_id">Desa</label>
                                        <select class="form-control @error('desa_id') is-invalid @enderror" id="desa_id"
                                            name="desa_id">
                                            <option selected disabled>Pilih Kelurahan terlebih dahulu ...</option>
                                            @foreach ($desa as $item_desa)
                                                @php
                                                    $temp = false;
                                                @endphp
                                                <option value="{{ $item_desa->id }}"
                                                    @foreach ($item_desa->kelurahan_desa as $item_kel_des) 
                                @if ($item_kel_des->kelurahan_id == $kelurahan_desa->kelurahan_id && $item_kel_des->desa_id == $kelurahan_desa->desa_id)
                                selected
                                @endif 
                                @if ($item_kel_des->kelurahan_id == $kelurahan_desa->kelurahan_id && $item_kel_des->desa_id != $kelurahan_desa->desa_id)
                                @php
                                 $temp=true   
                                @endphp
                                class="text-danger" disabled
                                @endif @endforeach>
                                                    {{ $item_desa->nama }} @if ($temp == true)
                                                        (sudah dipilih!)
                                                    @endif
                                                </option>
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
                                <a href="/kecamatan_kelurahan_desa" class="btn btn-outline-danger">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->

    @endsection
