@extends('layouts.master')
@section('title', 'ELECTRE | Lokasi Wisata & Sub Kriteria')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="card-title">Lokasi Wisata</h4>
                                    <hr>
                                    <a href="/lokasi_wisata-add" class="btn btn-sm btn-primary mb-3">Tambah Lokasi Wisata
                                        <i class="fa-solid fa-plus ml-1"></i>
                                    </a>
                                    {{-- <p class="card-description">
                                Add class <code>.table-hover</code>
                            </p> --}}
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered table-striped" id="myTable">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Kecamatan</th>
                                                    <th>Kelurahan</th>
                                                    <th>Desa</th>
                                                    <th style="width: 50px;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($lokasi_wisata as $item_lokasi_wisata)
                                                    <tr>
                                                        <th>{{ $loop->iteration }}</th>
                                                        <td>{{ $item_lokasi_wisata->nama }}</td>
                                                        <td>
                                                            @if (isset($item_lokasi_wisata->kecamatan->nama))
                                                                {{ $item_lokasi_wisata->kecamatan->nama }}
                                                            @else
                                                                <span class="text-danger">
                                                                    <span class="badge bg-danger-faded text-danger">
                                                                        Kecamatan
                                                                        belum dipilih!
                                                                    </span>
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (isset($item_lokasi_wisata->kelurahan->nama))
                                                                {{ $item_lokasi_wisata->kelurahan->nama }}
                                                            @else
                                                                <span class="text-danger">
                                                                    <span class="badge bg-danger-faded text-danger">
                                                                        Kelurahan
                                                                        belum dipilih!
                                                                    </span>
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (isset($item_lokasi_wisata->desa->nama))
                                                                {{ $item_lokasi_wisata->desa->nama }}
                                                            @else
                                                                <span class="text-danger">
                                                                    <span class="badge bg-danger-faded text-danger">
                                                                        Desa
                                                                        belum dipilih!
                                                                    </span>
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="lokasi_wisata-edit/{{ $item_lokasi_wisata->id }}">
                                                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                            </a>
                                                            <span class="px-1">|</span>
                                                            <a href="#"
                                                                onclick="hapus('{{ $item_lokasi_wisata->id }}','lokasi_wisata')">
                                                                <i class="fa-regular fa-trash-can text-danger"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="card-title">Relasi Lokasi Wisata & Sub Kriteria</h4>
                                    <hr>
                                    <a href="/lokasi_wisata_sub_kriteria-add" class="btn btn-sm btn-primary mb-3">Tambah
                                        Relasi
                                        <i class="fa-solid fa-plus ml-1"></i>
                                    </a>
                                    {{-- <p class="card-description">
                                Add class <code>.table-hover</code>
                            </p> --}}
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered table-striped" id="myTable3">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Lokasi Wisata</th>
                                                    <th>Kriteria</th>
                                                    <th>Sub Kriteria</th>
                                                    <th>Bobot</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($lokasi_wisata as $item_lokasi_wisata)
                                                    <tr>
                                                        <td><span class="fw-bold ms-1">{{ $loop->iteration }}</span></td>
                                                        <td>{{ $item_lokasi_wisata->nama }}</td>
                                                        <td>
                                                            @if (isset($item_lokasi_wisata->lokasi_wisata_sub_kriteria) &&
                                                                    count($item_lokasi_wisata->lokasi_wisata_sub_kriteria) > 0)
                                                                @php
                                                                    $i = 1;
                                                                @endphp
                                                                @foreach ($item_lokasi_wisata->lokasi_wisata_sub_kriteria as $item2)
                                                                    @if (isset($item2->kriteria->nama) && $item2->kriteria->nama !== null)
                                                                        <li class="py-1">
                                                                            {{ $item2->kriteria->nama }}@if ($item2->kriteria->bobot_perhitungan == 'JSK')
                                                                                {{ $i++ }}
                                                                            @endif
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <span class="text-danger">
                                                                    <span class="badge bg-danger-faded text-danger">
                                                                        Kriteria
                                                                        belum dipilih!
                                                                    </span>
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (isset($item_lokasi_wisata->lokasi_wisata_sub_kriteria) &&
                                                                    count($item_lokasi_wisata->lokasi_wisata_sub_kriteria) > 0)
                                                                @foreach ($item_lokasi_wisata->lokasi_wisata_sub_kriteria as $item2)
                                                                    <li class="py-1">
                                                                        {{ $item2->sub_kriteria->nama }}

                                                                        {{-- <span class="text-danger">
                                                                        <span
                                                                            class="badge bg-danger-faded text-danger">Bobot
                                                                            belum diisi!
                                                                        </span>
                                                                    </span> --}}

                                                                    </li>
                                                                @endforeach
                                                            @else
                                                                <span class="text-danger">
                                                                    <span class="badge bg-danger-faded text-danger">Sub
                                                                        Kriteria
                                                                        belum dipilih!
                                                                    </span>
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (isset($item_lokasi_wisata->lokasi_wisata_sub_kriteria) &&
                                                                    count($item_lokasi_wisata->lokasi_wisata_sub_kriteria) > 0)
                                                                @foreach ($item_lokasi_wisata->lokasi_wisata_sub_kriteria as $item2)
                                                                    <li class="py-1">
                                                                        @foreach ($kriteria_sub_kriteria as $item3)
                                                                            @if ($item2->sub_kriteria_id == $item3->sub_kriteria_id)
                                                                                @if ($item2->kriteria_id == $item3->kriteria_id)
                                                                                    {{ $item3->bobot }}
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                    </li>
                                                                @endforeach
                                                                {{-- @else
                                                        <span class="text-danger">
                                                            <span class="badge bg-danger-faded text-danger">Sub Kriteria
                                                                belum diisi!
                                                            </span>
                                                        </span> --}}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @foreach ($item_lokasi_wisata->lokasi_wisata_sub_kriteria as $item4)
                                                                <div class="py-1">
                                                                    <a
                                                                        href="lokasi_wisata_sub_kriteria-edit/{{ $item4->id }}">
                                                                        <i
                                                                            class="fa-solid fa-pen-to-square text-primary"></i>
                                                                    </a>
                                                                    <span class="px-1 fw-bold">|</span>
                                                                    <a href="#"
                                                                        onclick="hapus('{{ $item4->id }}','lokasi_wisata_sub_kriteria')">
                                                                        <i class="fa-regular fa-trash-can text-danger"></i>
                                                                    </a>
                                                                    <br>
                                                                </div>
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->

    @endsection
