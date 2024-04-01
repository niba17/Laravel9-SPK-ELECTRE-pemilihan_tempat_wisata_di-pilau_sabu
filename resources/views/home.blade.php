@extends('layouts.master')
@section('title', 'ELECTRE | Home')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin transparent">
                    <div class="row">
                        <a href="/akun" style="text-decoration:none;"
                            class="col-md-6 mb-4 mb-lg-0 stretch-card transparent pb-3">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    {{-- <p class="mb-4 h3">Akun</p> --}}
                                    <p class="ml-2 h3 font-weight-bold">Akun
                                    </p>
                                    <i class="ml-2 fa-solid fa-user mt-3 fa-2x"></i>
                                    <i class="fa-solid fa-caret-right fa-2x px-2"></i>
                                    <span class="h2">{{ count($akun) }}</span>

                                    {{-- <span class="h3">{{ count($akun) }}</span> --}}
                                </div>
                            </div>
                        </a>
                        <a href="/kriteria_sub_kriteria" style="text-decoration:none;"
                            class="col-md-6 mb-4 mb-lg-0 stretch-card transparent pb-3">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    {{-- <p class="mb-4 h3">Akun</p> --}}
                                    <p class="ml-2 h3 font-weight-bold">Kriteria & Sub Kriteria
                                    </p>
                                    <i class="ml-2 fa-solid fa-gear fa-2x mt-3"></i>
                                    <i class="fa-solid fa-caret-right fa-2x px-2"></i>
                                    <span class="h2">{{ count($kriteria) }}<span
                                            class="px-2">|</span>{{ count($sub_kriteria) }}
                                    </span>
                                    {{-- <span class="h3">{{ count($akun) }}</span> --}}
                                </div>
                            </div>
                        </a>
                        <a href="/lokasi_wisata_sub_kriteria" style="text-decoration:none;"
                            class="col-md-6 mb-4 mb-lg-0 stretch-card transparent pb-3">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    {{-- <p class="mb-4 h3">Akun</p> --}}
                                    <p class="ml-2 h3 font-weight-bold">Lokasi Wisata & Sub Kriteria
                                    </p>
                                    <i class="ml-2 fa-solid fa-users-gear fa-2x mt-3"></i>
                                    <i class="fa-solid fa-caret-right fa-2x px-2"></i>
                                    <span class="h2">{{ count($lokasi_wisata) }}<span
                                            class="px-2">|</span>{{ count($sub_kriteria) }}
                                    </span>
                                    {{-- <span class="h3">{{ count($akun) }}</span> --}}
                                </div>
                            </div>
                        </a>
                        <a href="/kecamatan_kelurahan_desa" style="text-decoration:none;"
                            class="col-md-6 mb-4 mb-lg-0 stretch-card transparent pb-3">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    {{-- <p class="mb-4 h3">Akun</p> --}}
                                    <p class="ml-2 h3 font-weight-bold">Kecamatan, Kelurahan & Desa
                                    </p>
                                    <i class="fa-solid fa-map-location-dot fa-2x mt-3"></i>
                                    <i class="ml-2 fa-solid fa-caret-right fa-2x px-2"></i>
                                    <span class="h2">{{ count($kecamatan) }}<span
                                            class="px-2">|</span>{{ count($kelurahan) }}<span
                                            class="px-2">|</span>{{ count($desa) }}
                                    </span>
                                    {{-- <span class="h3">{{ count($akun) }}</span> --}}
                                </div>
                            </div>
                        </a>
                        <a href="#" onclick="perhitungan()" style="text-decoration:none;"
                            class="col-md-6 mb-4 mb-lg-0 stretch-card transparent pb-3">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    {{-- <p class="mb-4 h3">Akun</p> --}}
                                    <p class="ml-2 h3 font-weight-bold">Perhitungan
                                    </p>
                                    <i class="fa-solid fa-cash-register fa-2x mt-3"></i>
                                    <i class="ml-2 fa-solid fa-caret-right fa-2x px-2"></i>
                                    <span class="h2">ELECTRE
                                    </span>
                                    {{-- <span class="h3">{{ count($akun) }}</span> --}}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->

    @endsection
