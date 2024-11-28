<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="">
                <span>
                    Peminjaman Buku Digital
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mx-auto ">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/daftar-peminjaman">Buku di pinjam</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/buku/rating">Rating</a>
                    </li>
                    <li class="nav-item">
                        @if ($isAnggota)
                            <a class="nav-link" href="/keanggotaan">Data Keanggotaan</a>
                        @else
                            <a class="nav-link" href="/daftar-anggota">Daftar Anggota</a>
                        @endif
                    </li>                    
                </ul>
            </div>
        </nav>
    </div>
</header>
