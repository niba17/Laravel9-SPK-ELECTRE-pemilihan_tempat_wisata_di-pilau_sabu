@extends('layouts.master')
@section('title', 'ELECTRE | Edit Relasi Kriteria & Sub Kriteria')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Relasi Kriteria & Sub Kriteria</h4>
                            {{-- <p class="card-description">
                        Basic form layout
                    </p> --}}
                            <form class="forms-sample" action="/kriteria_sub_kriteria-update/{{ $kriteria_sub_kriteria->id }}"
                                method="post">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="kriteria_id">Kriteria</label>
                                        <input type="text"
                                            class="form-control @error('kriteria_id') is-invalid @enderror" id="kriteria_id"
                                            value="{{ $kriteria_sub_kriteria->kriteria->nama }}" disabled
                                            aria-describedby="emailHelp">
                                        @error('kriteria_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <input type="hidden" class="form-control" id="kriteria_id" name="kriteria_id"
                                            value="{{ $kriteria_sub_kriteria->kriteria->id }}">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="sub_kriteria_id">Sub Kriteria</label>
                                        <select class="form-control @error('sub_kriteria_id') is-invalid @enderror"
                                            id="sub_kriteria_id" name="sub_kriteria_id">
                                            <option selected disabled>Pilih Kriteria terlebih dahulu ...</option>
                                            @foreach ($sub_kriteria as $item_sub_kriteria)
                                                @php
                                                    $temp = false;
                                                @endphp
                                                <option value="{{ $item_sub_kriteria->id }}"
                                                    @foreach ($item_sub_kriteria->kriteria_sub_kriteria as $item_kriteria_sub_kriteria) 
                                @if (
                                    $item_kriteria_sub_kriteria->kriteria_id == $kriteria_sub_kriteria->kriteria_id &&
                                        $item_kriteria_sub_kriteria->sub_kriteria_id == $kriteria_sub_kriteria->sub_kriteria_id)
                                selected
                                @endif 
                                @if (
                                    $item_kriteria_sub_kriteria->kriteria_id == $kriteria_sub_kriteria->kriteria_id &&
                                        $item_kriteria_sub_kriteria->sub_kriteria_id != $kriteria_sub_kriteria->sub_kriteria_id)
                                @php
                                 $temp=true   
                                @endphp
                                class="text-danger" disabled
                                @endif @endforeach>
                                                    {{ $item_sub_kriteria->nama }} @if ($temp == true)
                                                        (sudah dipilih!)
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('sub_kriteria_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="bobot">Bobot</label>
                                        <input type="number" class="form-control @error('bobot') is-invalid @enderror"
                                            id="bobot" name="bobot" value="{{ $kriteria_sub_kriteria->bobot }}"
                                            step="any">
                                        @error('bobot')
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
