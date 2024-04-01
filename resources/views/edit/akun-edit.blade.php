@extends('layouts.master')
@section('title', 'ELECTRE | Edit Akun')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Akun</h4>
                            {{-- <p class="card-description">
                                Basic form layout
                            </p> --}}
                            <form class="forms-sample" action="/akun-update/{{ $akun->id }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="nama">Username</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" name="nama" value="{{ $akun->nama }}">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="password">Username</label>
                                        <input type="text" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" placeholder="...">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="konfirmPassword">Username</label>
                                        <input type="text"
                                            class="form-control @error('konfirmPassword') is-invalid @enderror"
                                            id="konfirmPassword" placeholder="..." name="konfirmPassword">
                                        @error('konfirmPassword')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <a href="/akun" class="btn btn-outline-danger">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->

    @endsection
