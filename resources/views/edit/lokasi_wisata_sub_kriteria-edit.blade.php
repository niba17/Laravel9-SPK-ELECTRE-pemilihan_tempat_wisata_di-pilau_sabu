@extends('layouts.master')
@section('title', 'ELECTRE | Edit Relasi Lokasi Wisata & Sub Kriteria')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Relasi Lokasi Wisata & Sub Kriteria</h4>
                            {{-- <p class="card-description">
                        Basic form layout
                    </p> --}}
                            <form class="forms-sample"
                                action="/lokasi_wisata_sub_kriteria-update/{{ $lokasi_wisata_sub_kriteria->id }}"
                                method="post">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="lokasi_wisata_id">lokasi_wisata</label>
                                        <input type="text"
                                            class="form-control @error('lokasi_wisata_id') is-invalid @enderror"
                                            id="lokasi_wisata_id"
                                            value="{{ $lokasi_wisata_sub_kriteria->lokasi_wisata->nama }}" disabled
                                            aria-describedby="emailHelp">
                                        @error('lokasi_wisata_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <input type="hidden" class="form-control" id="lokasi_wisata_id"
                                            name="lokasi_wisata_id"
                                            value="{{ $lokasi_wisata_sub_kriteria->lokasi_wisata->id }}">
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="kriteria_id">Kriteria</label>
                                        <select class="form-control @error('kriteria_id') is-invalid @enderror"
                                            id="kriteria_id_lokasi_wisata" name="kriteria_id">
                                            {{-- <option selected disabled>Pilih Kriteria terlebih dahulu ...</option> --}}
                                            @foreach ($kriteria as $item)
                                                @php
                                                    $temp = false;
                                                @endphp
                                                <option value="{{ $item->id }}"
                                                    @foreach ($item->lokasi_wisata_sub_kriteria as $item2) 
                                @if (
                                    $item2->lokasi_wisata_id == $lokasi_wisata_sub_kriteria->lokasi_wisata_id &&
                                        $item2->kriteria_id == $lokasi_wisata_sub_kriteria->kriteria_id)
                                selected
                                @endif 
                                @if (
                                    $item2->lokasi_wisata_id == $lokasi_wisata_sub_kriteria->lokasi_wisata_id &&
                                        $item2->kriteria_id != $lokasi_wisata_sub_kriteria->kriteria_id)
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
                                                @if ($item_kriteria->id == $lokasi_wisata_sub_kriteria->kriteria_id)
                                                    @foreach ($item_kriteria->kriteria_sub_kriteria as $item_kriteria_sub_kriteria)
                                                        <option value="{{ $item_kriteria_sub_kriteria->sub_kriteria_id }}"
                                                            @php
$valid=true; @endphp
                                                            @foreach ($lokasi_wisata_sub_kriteria_get as $item_lokasi_wisata_sub_kriteria_get)
                                                        @if (
                                                            $item_kriteria_sub_kriteria->kriteria_id == $item_lokasi_wisata_sub_kriteria_get->kriteria_id &&
                                                                $item_kriteria_sub_kriteria->sub_kriteria_id == $item_lokasi_wisata_sub_kriteria_get->sub_kriteria_id &&
                                                                $lokasi_wisata_sub_kriteria->lokasi_wisata_id == $item_lokasi_wisata_sub_kriteria_get->lokasi_wisata_id &&
                                                                $lokasi_wisata_sub_kriteria->sub_kriteria_id == $item_lokasi_wisata_sub_kriteria_get->sub_kriteria_id)
                                                           selected
                                                        @endif  @if (
                                                            $item_kriteria_sub_kriteria->kriteria_id == $item_lokasi_wisata_sub_kriteria_get->kriteria_id &&
                                                                $item_kriteria_sub_kriteria->sub_kriteria_id == $item_lokasi_wisata_sub_kriteria_get->sub_kriteria_id &&
                                                                $lokasi_wisata_sub_kriteria->lokasi_wisata_id == $item_lokasi_wisata_sub_kriteria_get->lokasi_wisata_id &&
                                                                $lokasi_wisata_sub_kriteria->sub_kriteria_id !== $item_lokasi_wisata_sub_kriteria_get->sub_kriteria_id)
                                                           disabled class="text-danger"
                                                        @endif @endforeach>
                                                            {{ $item_kriteria_sub_kriteria->sub_kriteria->nama }}
                                                            @if ($valid == false)
                                                                (sub kriteria sudah ada!)
                                                            @endif
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
                                <a href="/lokasi_wisata_sub_kriteria" class="btn btn-outline-danger">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->

    @endsection
