@extends('users.default')
@section('content')


<div class="single-product-slider">
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-lg-6 text-left">
                <div class="section-title">
                    <h3>Produk Unggulan</h3>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="row">

            <!-- single product -->
            <div class="col-lg-3 col-md-4">
                <div class="single-product">
                    <a href="single-product.html">
                        <div class="card">
                            <div class="view overlay">
                                <img class="card-img-top" src="images/produk/a3.jpg" alt="Card image cap">
                                <a href="#!">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <div class="product-details">
                                <!-- Card content -->
                                <div class="card-body">

                                    <!-- Title -->
                                    <h6 class="card-title" style="margin-top:-10px;">Nama Produk</h6>
                                    <!-- Text -->
                                    <div class="price">
                                        <h6>Rp 150.000</h6>
                                    </div>

                                    {{-- <p class="card-text">Some quick example text to build on the card ti</p> --}}
                                    <!-- Button -->
                                    {{--  <div class="prd-bottom">
                                        <a href="#" class="social-info">
                                            <span class="lnr lnr-cart"></span>
                                            <p class="hover-text">Add to bag</p>
                                        </a>
                                        <a href="#" class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Wishlist</p>
                                        </a>
                                        <a href="single-product.html" class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">Lihat Detail</p>
                                        </a>
                                    </div>  --}}
                                    <div class="card-footer px-1" style="background:white">
                                        {{--  <span class="float-left font-weight-bold">
                                                <strong>49$</strong>
                                            </span> --}}
                                        <span class="float-right">
                                            <a class="material-tooltip-main" data-toggle="tooltip" data-placement="top"
                                                title="Masukan keranjang">
                                                <i class="fas fa-shopping-cart grey-text ml-3"></i>
                                            </a>
                                            <a class="material-tooltip-main" data-toggle="tooltip" data-placement="top"
                                                title="Tambah Wishlist">
                                                <i class="fas fa-heart grey-text ml-3"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                    </a>
                </div>
            </div>
        </div>

            <!-- single product -->
            <div class="col-lg-3 col-md-4">
                <div class="single-product">
                    <a href="single-product.html">
                        <div class="card">
                            <div class="view overlay">
                                <img class="card-img-top" src="images/produk/a3.jpg" alt="Card image cap">
                                <a href="#!">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <div class="product-details">
                                <!-- Card content -->
                                <div class="card-body">

                                    <!-- Title -->
                                    <h6 class="card-title" style="margin-top:-10px;">Nama Produk</h6>
                                    <!-- Text -->
                                    <div class="price">
                                        <h6>Rp 150.000</h6>
                                    </div>

                                    {{-- <p class="card-text">Some quick example text to build on the card ti</p> --}}
                                    <!-- Button -->
                                    {{--  <div class="prd-bottom">
                                        <a href="#" class="social-info">
                                            <span class="lnr lnr-cart"></span>
                                            <p class="hover-text">Add to bag</p>
                                        </a>
                                        <a href="#" class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Wishlist</p>
                                        </a>
                                        <a href="single-product.html" class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">Lihat Detail</p>
                                        </a>
                                    </div>  --}}
                                    <div class="card-footer px-1" style="background:white">
                                        {{--  <span class="float-left font-weight-bold">
                                                <strong>49$</strong>
                                            </span> --}}
                                        <span class="float-right">
                                            <a class="material-tooltip-main" data-toggle="tooltip" data-placement="top"
                                                title="Masukan keranjang">
                                                <i class="fas fa-shopping-cart grey-text ml-3"></i>
                                            </a>
                                            <a class="material-tooltip-main" data-toggle="tooltip" data-placement="top"
                                                title="Tambah Wishlist">
                                                <i class="fas fa-heart grey-text ml-3"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- single product -->
        <div class="col-lg-3 col-md-4">
            <div class="single-product">
                <a href="single-product.html">
                    <div class="card">
                        <div class="view overlay">
                            <img class="card-img-top" src="images/produk/a3.jpg" alt="Card image cap">
                            <a href="#!">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="product-details">
                            <!-- Card content -->
                            <div class="card-body">

                                <!-- Title -->
                                <h6 class="card-title" style="margin-top:-10px;">Nama Produk</h6>
                                <!-- Text -->
                                <div class="price">
                                    <h6>Rp 150.000</h6>
                                </div>

                                {{-- <p class="card-text">Some quick example text to build on the card ti</p> --}}
                                <!-- Button -->
                                {{--  <div class="prd-bottom">
                                        <a href="#" class="social-info">
                                            <span class="lnr lnr-cart"></span>
                                            <p class="hover-text">Add to bag</p>
                                        </a>
                                        <a href="#" class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Wishlist</p>
                                        </a>
                                        <a href="single-product.html" class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">Lihat Detail</p>
                                        </a>
                                    </div>  --}}
                                <div class="card-footer px-1" style="background:white">
                                    {{--  <span class="float-left font-weight-bold">
                                                <strong>49$</strong>
                                            </span> --}}
                                    <span class="float-right">
                                        <a class="material-tooltip-main" data-toggle="tooltip" data-placement="top"
                                            title="Masukan keranjang">
                                            <i class="fas fa-shopping-cart grey-text ml-3"></i>
                                        </a>
                                        <a class="material-tooltip-main" data-toggle="tooltip" data-placement="top"
                                            title="Tambah Wishlist">
                                            <i class="fas fa-heart grey-text ml-3"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                </a>
            </div>
        </div>
    </div>
    <!-- single product -->
    <div class="col-lg-3 col-md-4">
        <div class="single-product">
            <a href="single-product.html">
                <div class="card">
                    <div class="view overlay">
                        <img class="card-img-top" src="images/produk/a3.jpg" alt="Card image cap">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <div class="product-details">
                        <!-- Card content -->
                        <div class="card-body">

                            <!-- Title -->
                            <h6 class="card-title" style="margin-top:-10px;">Nama Produk</h6>
                            <!-- Text -->
                            <div class="price">
                                <h6>Rp 150.000</h6>
                            </div>

                            {{-- <p class="card-text">Some quick example text to build on the card ti</p> --}}
                            <!-- Button -->
                            {{--  <div class="prd-bottom">
                                        <a href="#" class="social-info">
                                            <span class="lnr lnr-cart"></span>
                                            <p class="hover-text">Add to bag</p>
                                        </a>
                                        <a href="#" class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Wishlist</p>
                                        </a>
                                        <a href="single-product.html" class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">Lihat Detail</p>
                                        </a>
                                    </div>  --}}
                            <div class="card-footer px-1" style="background:white">
                                {{--  <span class="float-left font-weight-bold">
                                                <strong>49$</strong>
                                            </span> --}}
                                <span class="float-right">
                                    <a class="material-tooltip-main" data-toggle="tooltip" data-placement="top"
                                        title="Masukan keranjang">
                                        <i class="fas fa-shopping-cart grey-text ml-3"></i>
                                    </a>
                                    <a class="material-tooltip-main" data-toggle="tooltip" data-placement="top"
                                        title="Tambah Wishlist">
                                        <i class="fas fa-heart grey-text ml-3"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
            </a>
        </div>
    </div>
</div>
<!-- single product -->
<div class="col-lg-3 col-md-4">
    <div class="single-product">
        <a href="single-product.html">
            <div class="card">
                <div class="view overlay">
                    <img class="card-img-top" src="images/produk/a3.jpg" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <div class="product-details">
                    <!-- Card content -->
                    <div class="card-body">

                        <!-- Title -->
                        <h6 class="card-title" style="margin-top:-10px;">Nama Produk</h6>
                        <!-- Text -->
                        <div class="price">
                            <h6>Rp 150.000</h6>
                        </div>

                        {{-- <p class="card-text">Some quick example text to build on the card ti</p> --}}
                        <!-- Button -->
                        {{--  <div class="prd-bottom">
                                        <a href="#" class="social-info">
                                            <span class="lnr lnr-cart"></span>
                                            <p class="hover-text">Add to bag</p>
                                        </a>
                                        <a href="#" class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Wishlist</p>
                                        </a>
                                        <a href="single-product.html" class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">Lihat Detail</p>
                                        </a>
                                    </div>  --}}
                        <div class="card-footer px-1" style="background:white">
                            {{--  <span class="float-left font-weight-bold">
                                                <strong>49$</strong>
                                            </span> --}}
                            <span class="float-right">
                                <a class="material-tooltip-main" data-toggle="tooltip" data-placement="top"
                                    title="Masukan keranjang">
                                    <i class="fas fa-shopping-cart grey-text ml-3"></i>
                                </a>
                                <a class="material-tooltip-main" data-toggle="tooltip" data-placement="top"
                                    title="Tambah Wishlist">
                                    <i class="fas fa-heart grey-text ml-3"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
        </a>
    </div>
</div>
</div>

</div>
</div>
</div>
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

              
                 
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </div>
            </div>
        </div>
    </div>
@endsection
