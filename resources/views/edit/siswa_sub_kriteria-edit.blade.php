@extends('layouts.master')
@section('title', 'ELECTRE | Edit Relasi Kriteria & Sub Kriteria')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Relasi Siswa & Sub Kriteria</h4>
                            {{-- <p class="card-description">
                        Basic form layout
                    </p> --}}
                            <form class="forms-sample" action="/siswa_sub_kriteria-update/{{ $siswa_sub_kriteria->id }}"
                                method="post">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="siswa_id">Siswa</label>
                                        <input type="text" class="form-control @error('siswa_id') is-invalid @enderror"
                                            id="siswa_id" value="{{ $siswa_sub_kriteria->siswa->nama }}" disabled
                                            aria-describedby="emailHelp">
                                        @error('siswa_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <input type="hidden" class="form-control" id="siswa_id" name="siswa_id"
                                            value="{{ $siswa_sub_kriteria->siswa->id }}">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="kriteria_id">Kriteria</label>
                                        <select class="form-control @error('kriteria_id') is-invalid @enderror"
                                            id="kriteria_id_siswa" name="kriteria_id">
                                            {{-- <option selected disabled>Pilih Kriteria terlebih dahulu ...</option> --}}
                                            @foreach ($kriteria as $item)
                                                @php
                                                    $temp = false;
                                                @endphp
                                                <option value="{{ $item->id }}"
                                                    @foreach ($item->siswa_sub_kriteria as $item2) 
                                @if ($item2->siswa_id == $siswa_sub_kriteria->siswa_id && $item2->kriteria_id == $siswa_sub_kriteria->kriteria_id)
                                selected
                                @endif 
                                @if ($item2->siswa_id == $siswa_sub_kriteria->siswa_id && $item2->kriteria_id != $siswa_sub_kriteria->kriteria_id)
                                @php
                                 $temp=true   
                                @endphp
                                class="text-danger" disabled
                                @endif @endforeach>
                                                    {{ $item->nama }} @if ($temp == true)
                                                        (kriteria sudah ada!)
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kriteria_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="sub_kriteria_id">Sub Kriteria</label>
                                        <select class="form-control @error('sub_kriteria_id') is-invalid @enderror"
                                            id="sub_kriteria_id" name="sub_kriteria_id">
                                            {{-- <option selected disabled>Pilih Kriteria terlebih dahulu ...</option> --}}
                                            @foreach ($kriteria as $item_kriteria)
                                                @if ($item_kriteria->id == $siswa_sub_kriteria->kriteria_id)
                                                    @foreach ($item_kriteria->kriteria_sub_kriteria as $item_kriteria_sub_kriteria)
                                                        <option value="{{ $item_kriteria_sub_kriteria->sub_kriteria_id }}"
                                                            @foreach ($siswa_sub_kriteria_get as $item_siswa_sub_kriteria_get)
                                                        @if (
                                                            $item_siswa_sub_kriteria_get->siswa_id == $item_siswa_sub_kriteria_get->siswa_id &&
                                                                $item_kriteria_sub_kriteria->kriteria_id == $item_siswa_sub_kriteria_get->kriteria_id &&
                                                                $item_kriteria_sub_kriteria->sub_kriteria_id == $item_siswa_sub_kriteria_get->sub_kriteria_id)
                                                           selected
                                                        @endif @endforeach>
                                                            {{ $item_kriteria_sub_kriteria->sub_kriteria->nama }}

                                                        </option>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('sub_kriteria_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <a href="/siswa_sub_kriteria" class="btn btn-outline-danger">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->

    @endsection
