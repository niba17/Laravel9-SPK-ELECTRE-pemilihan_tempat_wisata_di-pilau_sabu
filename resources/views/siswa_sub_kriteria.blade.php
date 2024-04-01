@extends('layouts.master')
@section('title', 'ELECTRE | Siswa & Sub Kriteria')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="card-title">Siswa</h4>
                                    <hr>
                                    <a href="/siswa-add" class="btn btn-sm btn-primary mb-3">Tambah Siswa
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
                                                    <th>NIS</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Kecamatan</th>
                                                    <th>Kelurahan</th>
                                                    <th>Tingkat</th>
                                                    <th>Kelas</th>
                                                    <th style="width: 50px;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($siswa as $item_siswa)
                                                    <tr>
                                                        <th>{{ $loop->iteration }}</th>
                                                        <td>{{ $item_siswa->nama }}</td>
                                                        <td>{{ $item_siswa->nis }}</td>
                                                        <td>{{ $item_siswa->jk }}</td>
                                                        <td>{{ $item_siswa->tgl_lahir }}</td>
                                                        <td>{{ $item_siswa->kecamatan->nama ?? 'Belum ada data' }}</td>
                                                        <td>{{ $item_siswa->kelurahan->nama ?? 'Belum ada data' }}</td>
                                                        <td>{{ $item_siswa->tingkat->nama ?? 'Belum ada data' }}</td>
                                                        <td>{{ $item_siswa->kelas->nama ?? 'Belum ada data' }}</td>
                                                        <td>
                                                            <a href="siswa-edit/{{ $item_siswa->id }}">
                                                                <i class="fa-solid fa-pen-to-square text-primary"></i>
                                                            </a>
                                                            <span class="px-1">|</span>
                                                            <a href="#"
                                                                onclick="hapus('{{ $item_siswa->id }}','siswa')">
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
                                    <h4 class="card-title">Relasi Siswa & Sub Kriteria</h4>
                                    <hr>
                                    <a href="/siswa_sub_kriteria-add" class="btn btn-sm btn-primary mb-3">Tambah Relasi
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
                                                    <th>Siswa</th>
                                                    <th>Kriteria</th>
                                                    <th>Sub Kriteria</th>
                                                    <th>Bobot</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($siswa as $item)
                                                    <tr>
                                                        <td><span class="fw-bold ms-1">{{ $loop->iteration }}</span></td>
                                                        <td>{{ $item->nama }}</td>
                                                        <td>
                                                            @if (isset($item->siswa_sub_kriteria) && count($item->siswa_sub_kriteria) > 0)
                                                                @foreach ($item->siswa_sub_kriteria as $item2)
                                                                    @if (isset($item2->kriteria->nama) && $item2->kriteria->nama !== null)
                                                                        <li class="py-1">
                                                                            {{ $item2->kriteria->nama }}
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
                                                            @if (isset($item->siswa_sub_kriteria) && count($item->siswa_sub_kriteria) > 0)
                                                                @foreach ($item->siswa_sub_kriteria as $item2)
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
                                                            @if (isset($item->siswa_sub_kriteria) && count($item->siswa_sub_kriteria) > 0)
                                                                @foreach ($item->siswa_sub_kriteria as $item2)
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
                                                            @foreach ($item->siswa_sub_kriteria as $item4)
                                                                <div class="py-1">
                                                                    <a href="siswa_sub_kriteria-edit/{{ $item4->id }}">
                                                                        <i
                                                                            class="fa-solid fa-pen-to-square text-primary"></i>
                                                                    </a>
                                                                    <span class="px-1 fw-bold">|</span>
                                                                    <a href="#"
                                                                        onclick="hapus('{{ $item4->id }}','siswa_sub_kriteria')">
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
