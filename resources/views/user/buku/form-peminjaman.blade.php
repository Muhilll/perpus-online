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

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css">

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
    <section class="book_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Konfirmasi Peminjaman
                </h2>
            </div>
            <div class="row">
                <!-- Kolom Form -->
                <div class="col-md-6">
                    <div class="form_container">
                        <form action="{{ route('proses-pinjam-buku') }}" method="POST">
                            @csrf
                            <input name="id_anggota" value="{{ $anggota->id_anggota }}" type="text" hidden>
                            <div>
                                <label></label>
                                <input type="text" class="form-control" disabled value="{{ $anggota->nama }}">
                            </div>
                            <input name="id_buku" value="{{ $dataBuku->id_buku }}" type="text" hidden>
                            <div>
                                <label>Judul Buku</label>
                                <input type="text" class="form-control" disabled value="{{ $dataBuku->judul }}">
                            </div>
                            <div>
                                <label>Tanggal Jatuh Tempo(7 Hari Kedepan)</label>
                                <input name="tanggal_jatuh_tempo" type="date" id="tanggalJatuhTempo"
                                    class="form-control" readonly>
                            </div>
                            <div>
                                <label for="pilihan">Jenis Kelamin</label>
                                <select class="form-control" name="jkl">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="btn_box">
                                <button type="button" id="btnLanjutkan">Lanjutkan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Kolom Gambar -->
                <div class="col-md-6">
                    <div class="img_container">
                        <img src="{{ asset('images/buku.png') }}" alt="Book a Table" class="img-fluid ">
                    </div>
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

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>


</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tanggalJatuhTempoInput = document.getElementById('tanggalJatuhTempo');
        const currentDate = new Date();
        currentDate.setDate(currentDate.getDate() + 7);
        const year = currentDate.getFullYear();
        const month = String(currentDate.getMonth() + 1).padStart(2, '0');
        const day = String(currentDate.getDate()).padStart(2, '0');
        tanggalJatuhTempoInput.value = `${year}-${month}-${day}`;

    });

    document.getElementById('btnLanjutkan').addEventListener('click', function() {
        cekPinjaman({{ $isPinjam ? 'true' : 'false' }});
    });

    function cekPinjaman(isPinjam) {
        if (isPinjam) {
            Swal.fire({
                title: 'Buku sudah dipinjam',
                text: 'Anda sudah meminjam buku ini. Silakan kembalikan terlebih dahulu sebelum meminjam lagi.',
                icon: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    
                }
            });
        } else {
            Swal.fire({
                title: 'Anda akan meminjam buku ini',
                text: 'Jika sudah yakin, silahkan klik tombol OK.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form jika pengguna mengklik OK
                    document.querySelector('form').submit();
                }
            });
        }
    }
</script>

</html>
