@extends('layouts.master')
@section('title', 'PUSKESMALAKA | Edit Data')
@section('content')

    <main id="main">

        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-4">
            <div
                class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
                <nav class="mb-0" aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active"><a href="/puskes_alkes">Puskes & Alkes</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit data</li>
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
                    <h6 class="card-title m-0">Edit data</h6>
                </div>
                <div class="card-body">
                    <form action="/puskes_alkes-update/{{ $puskes_alkes->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label" for="alkes_id">Alkes</label>
                                    <div>
                                        <select class="form-select @error('alkes_id') is-invalid @enderror" name="alkes_id"
                                            id="puskes_alkes_id">
                                            @foreach ($alkes as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($puskes_alkes->alkes_id == $item->id) selected @endif>{{ $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('alkes_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label" for="puskesmas_id">Puskesmas</label>
                                    <div>
                                        <select class="form-select @error('puskesmas_id') is-invalid @enderror"
                                            name="puskesmas_id" id="puskesmas_id">
                                            @foreach ($puskesmas as $item)
                                                @php
                                                    $valid = true;
                                                @endphp
                                                @foreach ($item->puskes_alkes as $item2)
                                                    @if ($puskes_alkes->alkes_id == $item2->alkes_id && $item->id == $item2->puskesmas_id)
                                                        @php
                                                            $valid = false;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @if ($valid == false)
                                                    <option @if ($puskes_alkes->puskesmas_id != $item->id) disabled @endif
                                                        value="{{ $item->id }}"
                                                        @if ($puskes_alkes->puskesmas_id == $item->id) selected @endif
                                                        class="text-danger">
                                                        {{ $item->nama . ' (alkes sudah ada!)' }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}"
                                                        @if ($puskes_alkes->puskesmas_id == $item->id) selected @endif>
                                                        {{ $item->nama }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('puskesmas_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="/puskes_alkes" class="btn btn-outline-danger">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>

        </section>
        <!-- / Content-->

    </main>
    <!-- /Page Content -->
@endsection
