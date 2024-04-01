@extends('layouts.master')
@section('title', 'ELECTRE | Edit Relasi Tingkat & Kelas')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Relasi Tingkat & Kelas</h4>
                            {{-- <p class="card-description">
                        Basic form layout
                    </p> --}}
                            <form class="forms-sample" action="/tingkat_kelas-update/{{ $tingkat_kelas->id }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="tingkat_id">Tingkat</label>
                                        <input type="text" class="form-control @error('tingkat_id') is-invalid @enderror"
                                            id="tingkat_id" value="{{ $tingkat_kelas->tingkat->nama }}" disabled
                                            aria-describedby="emailHelp">
                                        @error('tingkat_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <input type="hidden" class="form-control" id="tingkat_id" name="tingkat_id"
                                            value="{{ $tingkat_kelas->tingkat->id }}">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="kelas_id">Kelas</label>
                                        <select class="form-control @error('kelas_id') is-invalid @enderror" id="kelas_id"
                                            name="kelas_id">
                                            <option selected disabled>Pilih Tingkat terlebih dahulu ...</option>
                                            @foreach ($kelas as $item_kelas)
                                                @php
                                                    $temp = false;
                                                @endphp
                                                <option value="{{ $item_kelas->id }}"
                                                    @foreach ($item_kelas->tingkat_kelas as $item_ting_kel) 
                                @if ($item_ting_kel->tingkat_id == $tingkat_kelas->tingkat_id && $item_ting_kel->kelas_id == $tingkat_kelas->kelas_id)
                                selected
                                @endif 
                                @if ($item_ting_kel->tingkat_id == $tingkat_kelas->tingkat_id && $item_ting_kel->kelas_id != $tingkat_kelas->kelas_id)
                                @php
                                 $temp=true   
                                @endphp
                                class="text-danger" disabled
                                @endif @endforeach>
                                                    {{ $item_kelas->nama }} @if ($temp == true)
                                                        (sudah dipilih!)
                                                    @endif
                                                </option>
                                            @endforeach
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
