@extends('layouts.master')
@section('title', 'ELECTRE | Akun')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row grid-margin transparent">
                @foreach ($akun as $item)
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;"> --}}
                                <i class="fa-solid fa-user-large rounded-circle img-fluid text-primary"
                                    style="font-size:100px;"></i>
                                {{-- <i class="fa-solid fa-user-shield rounded-circle img-fluid" style="font-size:100px;"></i> --}}
                                <h5 class="mt-3">{{ $item->nama }}</h5>
                                <p class="text-muted mb-4">Administrator</p>
                                {{-- <p class="text-muted mb-4">{{ $item->created_at }}</p> --}}
                                <div class="d-flex justify-content-center mb-2">
                                    <a href="/akun-edit/{{ $item->id }}"
                                        class="btn btn-primary mr-2  @if ($current_id != $item->id) disabled @endif"><i
                                            class="fa-solid fa-user-pen"></i></a>
                                    <button onclick="hapus('{{ $item->id }}','akun')" type="/akun-destroy"
                                        class="btn btn-outline-danger ms-1 @if ($current_id != $item->id) disabled @endif"><i
                                            class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- content-wrapper ends -->

    @endsection
