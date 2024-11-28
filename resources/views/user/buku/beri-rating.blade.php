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

    <style>
        /* Atur lebar elemen select dalam form */
        .form_container select {
            width: 100%;
            /* Mengatur lebar sesuai dengan form */
            padding: 8px;
            /* Memberikan jarak padding agar lebih nyaman */
            border-radius: 4px;
            /* Menambahkan efek border radius */
            border: 1px solid #ccc;
            /* Mengatur warna border */
            box-sizing: border-box;
            /* Memastikan padding tidak melebihi ukuran */
        }
    </style>

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

    <!-- about section -->

    <section class="about_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center mb-5">
                <h2>
                    {{$buku->judul}}
                </h2>
            </div>
            <div class="row">
                <div class="col">
                    <div class="img-box">
                        <img src="{{ asset('images/buku.png') }}" alt="Cover Buku">
                    </div>
                </div>
                <!-- Kolom Form -->
                <div class="col">
                    <div class="form_container">
                        <form action="{{ route('proses-beri-rating') }}" method="POST">
                            @csrf
                            <input type="text" name="id_pengembalian" value="{{$id_pengembalian}}" hidden>
                            <div class="my-3">
                                <label>Rating (1-10)</label>
                                <input id="ratingInput" name="rating" type="number" class="form-control" min="1" max="10" step="1">
                            </div>                            
                            <div>
                                <label>Ulasan</label>
                                <textarea style="resize: none;" name="ulasan" type="text" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                            <div class="mt-5">
                                <button class="btn btn-primary" style="color: white" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->

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

    <script>
        document.getElementById('ratingInput').addEventListener('input', function() {
            let value = parseInt(this.value);
            if (value < 1) {
                this.value = null;
            } else if (value > 10) {
                this.value = null;
            }
        });
    </script>

</body>

</html>
