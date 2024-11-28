<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="">

    <title> Feane </title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
        crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />

</head>

<body class="sub_page">

    <div class="hero_area">
        <div class="bg-box">
            <img src="{{ asset('images/hero-bg.jpg') }}" alt="">
        </div>
        <!-- header section strats -->
        @include('user/layout/header')
        <!-- end header section -->
    </div>

    <!-- book section -->
    <section class="offer_section layout_padding-bottom">
        <h1 class="text-center">Daftar Buku Yang Telah Dikembalikan</h1>
        <div class="offer_container">
            <div class="container">
                <div class="col">
                    @foreach ($dataPengembalian as $dataPengembalian)
                        <div class="box">
                            <div class="row mx-3">
                                <div class="img-box">
                                    <img class="mt-4" src="{{ asset('images/buku.png') }}" alt="">
                                </div>
                                <div class="content-box d-flex flex-column justify-content-center mx-3">
                                    <h5>{{ $dataPengembalian->judul }}</h5>
                                    <p class=" mb-0">
                                        Tanggal Pengembalian:&nbsp; &nbsp;
                                        {{ date('d-m-Y', strtotime($dataPengembalian->tanggal_pengembalian)) }}
                                    </p>
                                    @if (!$dataPengembalian->rating)
                                        <div class="d-flex align-items-center mt-5 ">
                                            <div class="detail-box">
                                                <a href="/buku/{{ $dataPengembalian->id_buku }}/{{$dataPengembalian->id_pengembalian}}/beri-rating"
                                                    class="btn btn-warning">Beri Rating dan Ulasan</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col" style="margin-left: 30vh">
                                <h5>Rating:&nbsp;&nbsp; {{ $dataPengembalian->rating }}</h5>
                                <h5>Ulasan:</h5>
                                <div class="card">
                                    <textarea style="resize: none;" name="" id="" cols="30" rows="5" readonly>{{ $dataPengembalian->ulasan }}</textarea>
                                </div>
                                <h6 class="mt-2">Tanggal ulasan:&nbsp; &nbsp;
                                    {{ $dataPengembalian->tanggal_dibuat ? date('d-m-Y', strtotime($dataPengembalian->tanggal_dibuat)) : '' }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- end book section -->

    <!-- footer section -->
    @include('user/layout/footer')
    <!-- footer section -->

    <!-- jQery -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
