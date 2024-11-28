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
        <h1 class="text-center">Daftar Pinjaman Buku</h1>
        <div class="offer_container">
            <div class="container">
                <div class="row">
                    @foreach ($dataPinjaman as $dataPinjaman)
                        <div class="col-md-6">
                            <div class="box justify-content-center">
                                <div class="img-box">
                                    <img class="mt-4" src="images/buku.png" alt="">
                                </div>
                                <div class="content-box d-flex flex-column justify-content-center">
                                    <h5 class="mx-3">{{ $dataPinjaman->buku->judul }}</h5>
                                    <p class="mx-3 mb-0">
                                        Tanggal Jatuh Tempo: <br> {{ $dataPinjaman->tanggal_jatuh_tempo }}
                                    </p>
                                    <div class="d-flex align-items-center mt-2">
                                        <div class="detail-box me-2">
                                            <a href="" class="btn btn-warning">Baca Sekarang</a>
                                        </div>
                                        <div class="mx-3">
                                            <a href="javascript:void(0);" class="btn btn-primary" onclick="konfirmasi('{{ $dataPinjaman->id_peminjaman }}')">Kembalikan</a>
                                        </div>
                                    </div>
                                </div>
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

    <script>
        function konfirmasi(id_peminjaman) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Buku tidak akan dapat dibaca lagi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, kembalikan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/buku/${id_peminjaman}/pengembalian`;
                }
            });
        }
    </script>
</body>

</html>
