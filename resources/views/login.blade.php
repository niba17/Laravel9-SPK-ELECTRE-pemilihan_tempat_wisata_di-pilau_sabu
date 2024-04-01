<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ELECTRE | Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('template') }}/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ asset('template') }}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('template') }}/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('template') }}/images/favicon.png" />

    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('/plugin') }}/fontawesomeFree620/css/all.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('/template') }}/plugins/fontawesome-free/css/all.min.css"> --}}
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <span class="h3">Login</span>
                                {{-- <img src="{{ asset('template') }}/images/logo.svg" alt="logo"> --}}
                            </div>
                            {{-- <h4>Hello! let's get started</h4> --}}
                            <h6 class="font-weight-light">Masukkan Username & Password.</h6>
                            <form class="pt-3" action="/login" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control form-control-lg @error('nama') is-invalid @enderror"
                                        id="exampleInputEmail1" placeholder="Username" name="nama"
                                        value="{{ old('nama') }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            Tampilkan Password
                                        </label>
                                    </div>
                                    <input type="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        id="login-password" placeholder="Password" name="password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        href="{{ asset('template') }}/index.html">Login</button>
                                </div>
                                <div class="my-3 d-flex justify-content-between align-items-center">
                                    <a href="/" class="text-dark">Kembali</a>
                                    <a href="#" class="auth-link text-black">Lupa Password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('template') }}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('template') }}/js/off-canvas.js"></script>
    <script src="{{ asset('template') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('template') }}/js/template.js"></script>
    <script src="{{ asset('template') }}/js/settings.js"></script>
    <script src="{{ asset('template') }}/js/todolist.js"></script>
    <!-- endinject -->

    <!-- Jquery JS -->
    <script type="text/javascript" src="{{ asset('library') }}/jquery361.js"></script>

    <!-- SweetAlert2 -->
    <script src="{{ asset('plugin') }}/sweetAlert2/sweetalert2.all.min.js"></script>

    <script>
        function l_password() {
            Swal.fire({
                text: "Hubungi pihak Developer untuk pemulihan Password!",
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        }

        @if (Session::has('errMessage'))
            Swal.fire({
                icon: 'error',
                title: '{{ Session::get('errMessage') }}'
                // timer: 3000
            })
        @endif

        $('.form-check-input').click(function() {
            if ($(this).is(':checked')) {
                $('#login-password').attr('type', 'text');
            } else {
                $('#login-password').attr('type', 'password');
            }
        })
    </script>
</body>

</html>
