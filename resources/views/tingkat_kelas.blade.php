@extends('layouts.master')
@section('title', 'ELECTRE | Tingkat & Kelas')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4 class="card-title">Tingkat</h4>
                                    <hr>
                                    <a href="/tingkat-add" class="btn btn-sm btn-primary mb-3">Tambah Tingkat
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
                                                    <th>Tingkat</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tingkat as $item_tingkat)
                                                    <tr>
                                                        <th>{{ $loop->iteration }}</th>
                                                        <td>{{ $item_tingkat->nama }}</td>
                                                        <td class="d-flex justify-content-center">
                                                            <a href="tingkat-edit/{{ $item_tingkat->id }}">
                                                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                            </a>
                                                            <span class="px-1">|</span>
                                                            <a href="#"
                                                                onclick="hapus('{{ $item_tingkat->id }}','tingkat')">
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
                                    <h4 class="card-title">Kelas</h4>
                                    <hr>
                                    <a href="/kelas-add" class="btn btn-sm btn-primary mb-3">Tambah Kelas
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
                                                    <th>Kelas</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($kelas as $item_kelas)
                                                    <tr>
                                                        <th>{{ $loop->iteration }}</th>
                                                        <td>{{ $item_kelas->nama }}</td>
                                                        <td class="d-flex justify-content-center">
                                                            <a href="kelas-edit/{{ $item_kelas->id }}">
                                                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                            </a>
                                                            <span class="px-1">|</span>
                                                            <a href="#"
                                                                onclick="hapus('{{ $item_kelas->id }}','kelas')">
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
                                    <h4 class="card-title">Relasi Tingkat & Kelas</h4>
                                    <hr>
                                    <a href="/tingkat_kelas-add" class="btn btn-sm btn-primary mb-3">Tambah Relasi
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
                                                    <th>Tingkat</th>
                                                    <th>Kelas</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tingkat as $item)
                                                    <tr>
                                                        <td><span class="fw-bold ms-1">{{ $loop->iteration }}</span></td>
                                                        <td>{{ $item->nama }}</td>
                                                        <td>
                                                            @if (isset($item->tingkat_kelas) && count($item->tingkat_kelas) > 0)
                                                                @foreach ($item->tingkat_kelas as $item2)
                                                                    <li class="py-1">
                                                                        {{ $item2->kelas->nama }}
                                                                    </li>
                                                                @endforeach
                                                            @else
                                                                <span class="text-danger">
                                                                    <span class="badge bg-danger-faded text-danger">Kelas
                                                                        belum dipilih!
                                                                    </span>
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td class="d-block">
                                                            @foreach ($item->tingkat_kelas as $item4)
                                                                <div class="d-flex justify-content-center py-1">
                                                                    <a href="tingkat_kelas-edit/{{ $item4->id }}">
                                                                        <i
                                                                            class="fa-solid fa-pen-to-square text-primary"></i>
                                                                    </a>
                                                                    <span class="px-1 fw-bold">|</span>
                                                                    <a href="#"
                                                                        onclick="hapus('{{ $item4->id }}','tingkat_kelas')">
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
