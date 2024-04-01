@extends('layouts.master')
@section('title', 'ELECTRE | Kecamatan & Kelurahan')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4 class="card-title">Kecamatan</h4>
                                    <hr>
                                    <a href="/kecamatan-add" class="btn btn-sm btn-primary mb-3">Tambah Kecamatan
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
                                                    <th>Kecamatan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatan as $item_kecamatan)
                                                    <tr>
                                                        <th>{{ $loop->iteration }}</th>
                                                        <td>{{ $item_kecamatan->nama }}</td>
                                                        <td class="d-flex justify-content-center">
                                                            <a href="kecamatan-edit/{{ $item_kecamatan->id }}">
                                                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                            </a>
                                                            <span class="px-1">|</span>
                                                            <a href="#"
                                                                onclick="hapus('{{ $item_kecamatan->id }}','kecamatan')">
                                                                <i class="fa-regular fa-trash-can text-danger"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h4 class="card-title">Kelurahan</h4>
                                    <hr>
                                    <a href="/kelurahan-add" class="btn btn-sm btn-primary mb-3">Tambah Kelurahan
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
                                                    <th>Kelurahan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($kelurahan as $item_kelurahan)
                                                    <tr>
                                                        <th>{{ $loop->iteration }}</th>
                                                        <td>{{ $item_kelurahan->nama }}</td>
                                                        <td class="d-flex justify-content-center">
                                                            <a href="kelurahan-edit/{{ $item_kelurahan->id }}">
                                                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                            </a>
                                                            <span class="px-1">|</span>
                                                            <a href="#"
                                                                onclick="hapus('{{ $item_kelurahan->id }}','kelurahan')">
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
                                    <h4 class="card-title">Relasi Kecamatan & Kelurahan</h4>
                                    <hr>
                                    <a href="/kecamatan_kelurahan-add" class="btn btn-sm btn-primary mb-3">Tambah Relasi
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
                                                    <th>Kecamatan</th>
                                                    <th>Kelurahan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($kecamatan as $item)
                                                    <tr>
                                                        <td><span class="fw-bold ms-1">{{ $loop->iteration }}</span></td>
                                                        <td>{{ $item->nama }}</td>
                                                        <td>
                                                            @if (isset($item->kecamatan_kelurahan) && count($item->kecamatan_kelurahan) > 0)
                                                                @foreach ($item->kecamatan_kelurahan as $item2)
                                                                    <li class="py-1">
                                                                        {{ $item2->kelurahan->nama }}
                                                                    </li>
                                                                @endforeach
                                                            @else
                                                                <span class="text-danger">
                                                                    <span
                                                                        class="badge bg-danger-faded text-danger">Kelurahan
                                                                        belum dipilih!
                                                                    </span>
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td class="d-block">
                                                            @foreach ($item->kecamatan_kelurahan as $item4)
                                                                <div class="d-flex justify-content-center py-1">
                                                                    <a href="kecamatan_kelurahan-edit/{{ $item4->id }}">
                                                                        <i
                                                                            class="fa-solid fa-pen-to-square text-primary"></i>
                                                                    </a>
                                                                    <span class="px-1 fw-bold">|</span>
                                                                    <a href="#"
                                                                        onclick="hapus('{{ $item4->id }}','kecamatan_kelurahan')">
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
