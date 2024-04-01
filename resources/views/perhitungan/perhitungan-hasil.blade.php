@extends('layouts.master')
@section('title', 'ELECTRE | Hasil')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Hasil Rekomendasi ELECTRE</h4>
                                            <hr>
                                            <a href="/home" class="btn btn-sm btn-primary mb-3"><i
                                                    class="fa-solid fa-chevron-left"></i> Kembali
                                            </a>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover table-bordered"
                                                    id="myTable">
                                                    <thead class="table-primary">
                                                        <tr>
                                                            <th>Ranking</th>
                                                            <th>Lokasi Wisata</th>
                                                            {{-- <th>Ranking</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($electre as $item_electre)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $item_electre['lokasi_wisata']['lokasi_wisata_nama'] }}
                                                                </td>
                                                                {{-- <td>{{ $loop->iteration }}</td> --}}
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
            </div>
        </div>
        <!-- content-wrapper ends -->

    @endsection
