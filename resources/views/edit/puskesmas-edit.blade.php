@extends('layouts.master')
@section('title', 'SIG | Tambah Data')
@section('content')

    <main id="main">

        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-4">
            <div
                class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
                <nav class="mb-0" aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active"><a href="/puskesmas">Puskesmas</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
            {{-- <a href="/puskesmas" type="button" class="col-lg-2 col-sm-3 btn mb-2 btn-primary-faded btn-sm"><i
                    class="fa-solid fa-caret-left"></i> Kembali
            </a> --}}
            <div class="card mb-4">
                <div class="card-header justify-content-between align-items-center d-flex">
                    <h6 class="card-title m-0">Edit data puskesmas</h6>
                </div>
                <div class="card-body">
                    <form action="/puskesmas-update/{{ $puskesmas->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" name="nama" value="{{ $puskesmas->nama }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="kecamatan_id" class="form-label">Kecamatan</label>
                                    <select class="form-select @error('kecamatan_id') is-invalid @enderror"
                                        id="kecamatan_id" name="kecamatan_id">
                                        @foreach ($kecamatan as $item)
                                            <option value="{{ $item->id }}"
                                                @if (isset($puskesmas->kecamatan->nama)) @if ($puskesmas->kecamatan->nama == $item->nama) {{ 'selected' }} @endif
                                            @else { {{ '' }} } @endif>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kecamatan_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="kelurahan_id" class="form-label">Kelurahan</label>
                                    <select class="form-select @error('kelurahan_id') is-invalid @enderror"
                                        aria-label="Default select example" id="kelurahan_id" name="kelurahan_id">
                                        @foreach ($kelurahan as $item)
                                            <option value="{{ $item->id }}"
                                                @if (isset($puskesmas->kelurahan->nama)) @if ($puskesmas->kelurahan->nama == $item->nama) {{ 'selected' }} @endif
                                            @else { {{ '' }} } @endif>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kelurahan_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="lat" class="form-label">Latitude</label>
                                    <input type="text" class="form-control @error('lat') is-invalid @enderror"
                                        id="lat" name="lat" value="{{ $puskesmas->lat }}">
                                    @error('lat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="lng" class="form-label">Longitude</label>
                                    <input type="text" class="form-control @error('lng') is-invalid @enderror"
                                        id="lng" name="lng" placeholder="..." value="{{ $puskesmas->lng }}">
                                    @error('lng')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div> --}}
                                </div>
                            </div>
                            @foreach ($faskes as $item)
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="kecamatan_id" class="form-label">{{ $item->nama }}</label>
                                        <select class="form-select @error('kecamatan_id') is-invalid @enderror"
                                            id="kecamatan_id" name="kecamatan_id">
                                            @foreach ($faskes as $item)
                                                <option value="{{ $item->id }}"
                                                    @if (isset($item->faskes->nama)) @if ($item->faskes->nama == $item->nama) {{ 'selected' }} @endif
                                                @else { {{ '' }} } @endif>
                                                    {{ $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kecamatan_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    @if (isset($puskesmas->gambar))
                                        <img src="{{ asset('storage/images/' . $puskesmas->gambar) }}"
                                            alt="{{ $puskesmas->gambar }}" style="width:100px;">
                                        <br>
                                    @endif
                                    <label for="gambar" class="form-label">
                                        @if (isset($puskesmas->gambar))
                                            ({{ $puskesmas->gambar }})
                                        @endif
                                    </label>
                                    <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                        id="gambar" name="gambar" value="{{ $puskesmas->gambar ?? '' }}">
                                    @error('gambar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <a href="/puskesmas" class="btn btn-outline-danger">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>

        </section>
        <!-- / Content-->

    </main>
    <!-- /Page Content -->
@endsection
