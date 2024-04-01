@extends('layouts.master')
@section('title', 'ELECTRE | Kriteria & Sub Kriteria')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="card-title">Kriteria</h4>
                                    <hr>
                                    <a href="/kriteria-add" class="btn btn-sm btn-primary mb-3">Tambah Kriteria
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
                                                    <th>Kriteria</th>
                                                    <th>Bobot Referensi</th>
                                                    <th>Cost / Benefit</th>
                                                    <th>Bobot Perhitungan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($kriteria as $item_kriteria)
                                                    <tr>
                                                        <th>{{ $loop->iteration }}</th>
                                                        <td>{{ $item_kriteria->nama }}</td>
                                                        <td>
                                                            @if ($item_kriteria->bobot_referensi)
                                                                {{ $item_kriteria->bobot_referensi }}
                                                            @else
                                                                <span class="text-danger">
                                                                    <span class="badge bg-danger-faded text-danger">Bobot
                                                                        Referensi
                                                                        belum dipilih!
                                                                    </span>
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($item_kriteria->cost_benefit)
                                                                {{ $item_kriteria->cost_benefit }}
                                                            @else
                                                                <span class="text-danger">
                                                                    <span class="badge bg-danger-faded text-danger">
                                                                        Cost / Benefit
                                                                        belum dipilih!
                                                                    </span>
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($item_kriteria->bobot_perhitungan)
                                                                @if ($item_kriteria->bobot_perhitungan == 'JSK')
                                                                    Jumlah Sub Kriteria
                                                                @elseif($item_kriteria->bobot_perhitungan == 'BSK')
                                                                    Bobot Sub Kriteria
                                                                @endif
                                                            @else
                                                                <span class="text-danger">
                                                                    <span class="badge bg-danger-faded text-danger">
                                                                        Bobot Referensi
                                                                        belum dipilih!
                                                                    </span>
                                                                </span>
                                                            @endif

                                                        </td>
                                                        <td class="d-flex justify-content-center">
                                                            <a href="kriteria-edit/{{ $item_kriteria->id }}">
                                                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                            </a>
                                                            <span class="px-1">|</span>
                                                            <a href="#"
                                                                onclick="hapus('{{ $item_kriteria->id }}','kriteria')">
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
                                    <h4 class="card-title">Sub Kriteria</h4>
                                    <hr>
                                    <a href="/sub_kriteria-add" class="btn btn-sm btn-primary mb-3">Tambah Sub Kriteria
                                        <i class="fa-solid fa-plus ml-1"></i>
                                    </a>
                                    {{-- <p class="card-description">
                                Add class <code>.table-hover</code>
                            </p> --}}
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered table-striped" id="myTable2">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Sub Kriteria</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sub_kriteria as $item_sub_kriteria)
                                                    <tr>
                                                        <th>{{ $loop->iteration }}</th>
                                                        <td>{{ $item_sub_kriteria->nama }}</td>
                                                        <td class="d-flex justify-content-center">
                                                            <a href="sub_kriteria-edit/{{ $item_sub_kriteria->id }}">
                                                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                            </a>
                                                            <span class="px-1">|</span>
                                                            <a href="#"
                                                                onclick="hapus('{{ $item_sub_kriteria->id }}','sub_kriteria')">
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
                                    <h4 class="card-title">Relasi Kriteria & Sub Kriteria</h4>
                                    <hr>
                                    <a href="/kriteria_sub_kriteria-add" class="btn btn-sm btn-primary mb-3">Tambah Relasi
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
                                                    <th>Kriteria</th>
                                                    <th>Sub Kriteria</th>
                                                    <th>Bobot</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($kriteria as $item)
                                                    <tr>
                                                        <td><span class="fw-bold ms-1">{{ $loop->iteration }}</span></td>
                                                        <td>{{ $item->nama }}</td>
                                                        <td>
                                                            @if (isset($item->kriteria_sub_kriteria) && count($item->kriteria_sub_kriteria) > 0)
                                                                @foreach ($item->kriteria_sub_kriteria as $item2)
                                                                    <li class="py-1">
                                                                        {{ $item2->sub_kriteria->nama }}
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
                                                            @if (isset($item->kriteria_sub_kriteria) && count($item->kriteria_sub_kriteria) > 0)
                                                                @foreach ($item->kriteria_sub_kriteria as $item2)
                                                                    <li class="py-1">
                                                                        {{ $item2->bobot }}
                                                                    </li>
                                                                @endforeach
                                                            @else
                                                                <span class="text-danger">
                                                                    <span class="badge bg-danger-faded text-danger">Bobot
                                                                        belum diisi!
                                                                    </span>
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td class="d-block">
                                                            @foreach ($item->kriteria_sub_kriteria as $item4)
                                                                <div class="d-flex justify-content-center py-1">
                                                                    <a
                                                                        href="kriteria_sub_kriteria-edit/{{ $item4->id }}">
                                                                        <i
                                                                            class="fa-solid fa-pen-to-square text-primary"></i>
                                                                    </a>
                                                                    <span class="px-1 fw-bold">|</span>
                                                                    <a href="#"
                                                                        onclick="hapus('{{ $item4->id }}','kriteria_sub_kriteria')">
                                                                        <i class="fa-regular fa-trash-can text-danger"></i>
                                                                    </a>
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
