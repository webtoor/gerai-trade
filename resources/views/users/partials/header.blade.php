<nav class="navbar navbar-expand-lg sticky-top navbar-dark navbar-dark indigo">
    <a class="navbar-brand" href="#">geraitrade</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto my-2 my-sm-0 ml-3">
            {{-- <li class="nav-item active" style="margin-right:20px;">
                <a class="nav-link" href="#">Beranda <span class="sr-only">(current)</span></a>
            </li> --}}
            <li class="nav-item dropdown" style="margin-right:20px;">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">Tentang Kita</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Siapa Kita</a>
                  <a class="dropdown-item" href="#">Cerita Kita</a>
                  <a class="dropdown-item" href="#">Kontak Kita</a>
                </div>
              </li>
            <li class="nav-item" style="margin-right:20px;">
                <a class="nav-link" href="#"><b>Belanja Bersama Kita</b></a>
            </li>
        </ul>
        <form class="form-inline">
            <a href="/login" class="btn btn-white btn-sm" role="button"  style="color:black">Masuk</a>
            <a href="/register" class="btn btn-outline-white btn-sm my-2 my-sm-0 ml-3" role="button"
                style="color:white">Daftar</a>
        </form>
    </div>
</nav>
