<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>SadTrue | Luapkan Isi Hatimu</title>

    @include('user.include.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
            <div class="container">
                <a href="{{ route('home.index') }}" class="navbar-brand">Sad<span class="text-primary">True.</span></a>

                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse" id="navbarContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home.index') }}">Beranda</a>
                        </li>


                        {{-- <li class="nav-item">
                            <a class="nav-link" href="about.html">Populer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="service.html">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.html">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li> --}}
                        <!-- <li class="nav-item">
              <a class="btn btn-primary ml-lg-2" href="#">Buat Caption</a>
            </li> -->
                        @if (Auth::check())
                            {{-- <li class="nav-item">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalCreate">
                                    Buat Caption
                                </button>
                            </li> --}}
                            <div class="nav-item dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{ route('home.caption') }}">Captionku</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                                    {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                                </ul>
                            </div>
                        @endif
                        @if (Auth::guest())
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="btn btn-primary ml-lg-2">
                                    Login
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>

            </div>
        </nav>



        <div class="container">
            <div class="page-banner home-banner">
                <div class="row align-items-center flex-wrap-reverse h-100">
                    <div class="col-md-6 py-5 wow fadeInLeft">
                        <h2 class="mb-4">Ayo Luapkan Isi Hatimu !</h2>
                        <p class="text-lg text-grey mb-5">dipendam jadi penyakit, ditulis jadi duit</p>
                        @if (Auth::check())
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modalCreate">
                                Tulis Sekarang
                            </button>
                        @endif

                        @if (Auth::guest())
                            <a href="{{ route('login') }}" class="btn btn-primary">
                                Daftar Sekarang
                            </a>
                        @endif


                    </div>
                    <div class="col-md-6 py-5 wow zoomIn">
                        <div class=" text-center">
                            <img class="img-fluid" src="../assets/img/ilustrasi1.svg" alt="">
                        </div>
                    </div>
                </div>
                <a href="#beranda" class="btn-scroll" data-role="smoothscroll"><span class="mai-arrow-down"></span></a>
            </div>
        </div>
    </header>


    <!-- Contoh Modal -->
    <div class="modal fade" id="modalCreate" tabindex="10" role="dialog" aria-labelledby="modalSayaLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSayaLabel">Buat Caption</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('home.store') }}" class="contact-form" method="post">
                        @csrf
                        <div class="row form-group">
                            {{-- <div class="col-md-12 mb-3">
                                <label class="text-black" for="fname">Namamu</label>
                                <input type="text" id="fname" class="form-control" name="input_penulis">
                            </div> --}}

                            <input type="hidden" name="input_penulis"
                                value="{{ Auth::check() ? Auth::user()->id : '' }}">

                            <div class="col-md-12">
                                {{-- <label class="text-black" for="message">Caption</label> --}}
                                <textarea name="input_caption" id="message" cols="30" rows="5" class="form-control"
                                    placeholder="Tuangkan isi hati dan pikiranmu disini"></textarea>
                                @error('input_caption')
                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Oke</button>

                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Blog -->
    @yield('konten')


    <footer class="page-footer bg-image" style="background-image: url(../assets/img/world_pattern.svg);">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-3 py-3">
                    <h3>SadTrue</h3>
                    <p>Website ini adalah website yang berguna untuk mencurahkan keluh kesahmu tentang percintaan atau
                        masalah kehidupan</p>

                    <div class="social-media-button">
                        <a href="#"><span class="mai-logo-facebook-f"></span></a>
                        <a href="#"><span class="mai-logo-twitter"></span></a>
                        <a href="#"><span class="mai-logo-google-plus-g"></span></a>
                        <a href="#"><span class="mai-logo-instagram"></span></a>
                        <a href="#"><span class="mai-logo-youtube"></span></a>
                    </div>
                </div>
                <div class="col-lg-3 py-3">
                    <h5>Programmer</h5>
                    <ul class="footer-menu">
                        <li><a href="#">Mkuadrattt</a></li>

                    </ul>
                </div>
                <div class="col-lg-3 py-3">
                    <h5>Contact Us</h5>
                    <p>Rambipuji Jember</p>
                    <a href="#" class="footer-link">0895343292830</a>
                    <a href="#" class="footer-link">techrambi@gmail.com</a>
                </div>

            </div>

        </div>
    </footer>

    @include('user.include.script')

    @stack('script-dt')

</body>

</html>
