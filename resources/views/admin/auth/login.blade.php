<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SadTrue - Login</title>
    @include('admin.include.style')

</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="navbar-brand">
                                <h1>Sad<span class="text-primary">True.</span></h1>
                            </div>
                            <h4>Halo, Apakah anda sudah punya akun ?</h4>
                            <h6 class="font-weight-light">Silahkan login terlebih dahulu</h6>
                            <form action="{{ route('proseslogin') }}" method="POST" class="pt-3">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                                        placeholder="Email" name="email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password" name="password">
                                </div>

                                <div class="mt-3 d-flex justify-content-between align-items-center">
                                    <a href="{{ route('home.index') }}"
                                        class="btn btn-block btn-danger btn-lg font-weight-medium auth-form-btn">BATAL</a>
                                    <button type="submit"
                                        class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">MASUK</button>
                                </div>
                                {{-- <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Forgot password?</a>
                                </div> --}}
                                {{-- <div class="mb-2">
                                    <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                                        <i class="mdi mdi-facebook me-2"></i>Connect using facebook </button>
                                </div> --}}
                                <div class="text-center mt-4 font-weight-light"> Belum punya Akun ? <a
                                        href="{{ route('register') }}" class="text-primary">Daftar disini</a>
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
    @include('admin.include.script')
    <!-- endinject -->
</body>

</html>
