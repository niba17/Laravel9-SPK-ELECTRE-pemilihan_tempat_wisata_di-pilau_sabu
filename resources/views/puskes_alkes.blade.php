@extends('layouts.master')
@section('title', 'PUSKESMALAKA | Puskes & Alkes')
@section('content')

    <main id="main">
        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-4">
            <div
                class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
                <nav class="mb-0" aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active"><a href="/puskesmas">Puskes & Alkes</a></li>
                        {{-- <li class="breadcrumb-item active" aria-current="page">Dashboard</li> --}}
                    </ol>
                </nav>
                {{-- <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
            <a class="btn btn-sm btn-primary" href="#"><i class="ri-add-circle-line align-bottom"></i> New
                Project</a>
            <a class="btn btn-sm btn-primary-faded ms-2" href="#"><i
                    class="ri-settings-3-line align-bottom"></i> Settings</a>
            <a class="btn btn-sm btn-secondary-faded ms-2 text-body" href="#"><i
                    class="ri-question-line align-bottom"></i> Help</a>
        </div> --}}
            </div>
        </div> <!-- / Breadcrumbs-->

        <section class="container-fluid">
            <div class="row">

                <div class="col-lg-5">
                    {{-- <a href="/puskes_alkes-add" type="button"
                        class="col-lg-3 col-sm-4 btn mb-2 btn-primary-faded btn-sm">Tambah
                        Alkes pada Puskesmas <i class="fa-solid fa-plus"></i>
                    </a> --}}
                    <div class="card mb-4">
                        <div class="card-header justify-content-between align-items-center d-flex">
                            <h6 class="card-title m-0">Daftar Puskesmas</h6>
                            {{-- <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"
                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-more-2-line"></i>
                        </button>
                        <ul class="dropdown-menu dropdown" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div> --}}
                        </div>
                        <div class="card-body">

                            <!-- User listing Actions-->
                            {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                        <form class="bg-light rounded px-3 py-1 flex-shrink-0 d-flex align-items-center">
                            <input class="form-control border-0 bg-transparent px-0 py-2 me-5 fw-bolder" type="search"
                                placeholder="Search" aria-label="Search">
                            <button class="btn btn-link p-0 text-muted" type="submit"><i
                                    class="ri-search-2-line"></i></button>
                        </form>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-outline-secondary btn-sm text-body me-2"><i
                                    class="ri-download-fill align-bottom"></i> Export Users</a>
                            <a class="btn btn-sm btn-primary" href="#"><i class="ri-add-circle-line align-bottom"></i>
                                New
                                User</a>
                        </div>
                    </div> --}}
                            <!-- /user listing Actions-->

                            <!-- User Listing Table-->
                            <div class="table-responsive">
                                <table class="table m-0 table-striped" id="myTable">
                                    <thead>
                                        <tr>
                                            {{-- <th>
                                        <div class="form-group form-check-custom mb-0 flex-shrink-0">
                                            <input type="checkbox" class="form-check-input" id="filter-">
                                        </div>
                                    </th> --}}
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Alkes</th>
                                            {{-- <th>Aksi</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($puskesmas as $item)
                                            <tr>
                                                {{-- <td>
                                            <div class="form-group form-check-custom mb-0">
                                                <input type="checkbox" class="form-check-input" id="filter-0">
                                            </div>
                                        </td> --}}
                                                <td><span class="fw-bold ms-1">{{ $loop->iteration }}</span></td>
                                                <td>{{ $item->nama }}</td>
                                                <td>
                                                    @if (count($item->puskes_alkes) > 0)
                                                        @foreach ($item->puskes_alkes as $item2)
                                                            <li>
                                                                {{ $item2->alkes->nama }}
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <span class="text-danger">
                                                            <span
                                                                class="badge rounded-pill bg-danger-faded text-danger">Alkes
                                                                belum dipilih!
                                                            </span>
                                                        </span>
                                                    @endif
                                                </td>
                                                {{-- <td>
                                                    <a href="puskes_alkes-edit/{{ $item->id }}"><i
                                                            class="fa-solid fa-pen-to-square text-primary"></i></a>
                                                    <span class="px-1 fw-bold">|</span>
                                                    <a href="#"
                                                        onclick="hapus('{{ $item->id }}','puskes_alkes')"><i
                                                            class="fa-solid fa-trash text-danger"></i></a>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /User Listing Table-->

                        </div>
                    </div>
                </div>

                <div class="col-lg-7">

                    <div class="card mb-4">
                        <div class="card-header justify-content-between align-items-center d-flex">
                            <h6 class="card-title m-0">Daftar Alkes</h6>
                            <a href="/puskes_alkes-add" type="button" class="btn-primary-faded btn-sm">Tambah
                                Alkes pada Puskesmas <i class="fa-solid fa-plus"></i>
                            </a>
                            {{-- <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"
                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-more-2-line"></i>
                        </button>
                        <ul class="dropdown-menu dropdown" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div> --}}
                        </div>
                        <div class="card-body">

                            <!-- User listing Actions-->
                            {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                        <form class="bg-light rounded px-3 py-1 flex-shrink-0 d-flex align-items-center">
                            <input class="form-control border-0 bg-transparent px-0 py-2 me-5 fw-bolder" type="search"
                                placeholder="Search" aria-label="Search">
                            <button class="btn btn-link p-0 text-muted" type="submit"><i
                                    class="ri-search-2-line"></i></button>
                        </form>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-outline-secondary btn-sm text-body me-2"><i
                                    class="ri-download-fill align-bottom"></i> Export Users</a>
                            <a class="btn btn-sm btn-primary" href="#"><i class="ri-add-circle-line align-bottom"></i>
                                New
                                User</a>
                        </div>
                    </div> --}}
                            <!-- /user listing Actions-->

                            <!-- User Listing Table-->
                            <div class="table-responsive">
                                <table class="table m-0 table-striped" id="myTable2">
                                    <thead>
                                        <tr>
                                            {{-- <th>
                                        <div class="form-group form-check-custom mb-0 flex-shrink-0">
                                            <input type="checkbox" class="form-check-input" id="filter-">
                                        </div>
                                    </th> --}}
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Puskesmas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alkes as $item)
                                            <tr>
                                                {{-- <td>
                                            <div class="form-group form-check-custom mb-0">
                                                <input type="checkbox" class="form-check-input" id="filter-0">
                                            </div>
                                        </td> --}}
                                                <td><span class="fw-bold ms-1">{{ $loop->iteration }}</span></td>
                                                <td>{{ $item->nama }}</td>
                                                <td>
                                                    @if (count($item->puskes_alkes) > 0)
                                                        @foreach ($item->puskes_alkes as $item2)
                                                            @if (isset($item2->puskesmas->nama))
                                                                <li>
                                                                    {{ $item2->puskesmas->nama }}
                                                                </li>
                                                            @else
                                                                <span class="text-danger">
                                                                    <span
                                                                        class="badge rounded-pill bg-danger-faded text-danger">Faskes
                                                                        belum dipilih!
                                                                    </span>
                                                                </span>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <span class="text-danger">
                                                            <span
                                                                class="badge rounded-pill bg-danger-faded text-danger">Faskes
                                                                belum dipilih!
                                                            </span>
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @foreach ($item->puskes_alkes as $item3)
                                                        <a href="puskes_alkes-edit/{{ $item3->id }}"><i
                                                                class="fa-solid fa-pen-to-square text-primary"></i></a>
                                                        <span class="px-1 fw-bold">|</span>
                                                        <a href="#"
                                                            onclick="hapus('{{ $item3->id }}','puskes_alkes')"><i
                                                                class="fa-solid fa-trash text-danger"></i></a><br>
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /User Listing Table-->

                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- / Content-->

    </main>
    <!-- /Page Content -->

@endsection
