@extends('users.default')
@section('css')
<style>
.carousel .item {
  height: 300px;
}

.item img {
    position: absolute;
    object-fit:cover;
    top: 0;
    left: 0;
    min-height: 300px;
}
</style>

@endsection
@section('content')


<div class="single-product-slider">
    @guest
    <div class="" style="width: 100%;">

    @else
    <div class="container-fluid">
    @endguest
       {{--  <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h3>Produk Unggulan</h3>
                    <p></p>
                </div>
            </div>
        </div> --}}
      
        <div class="row" >
                @guest
                @else
                @include('users.partials.sidebar')
                @endguest
               
            @guest
            <div class="col-sm-12">
            @else
            <div class="col-sm-10">
            @endguest
                <!--Carousel Wrapper-->

                @guest
                <div id="carousel-example-1z" class="carousel slide" data-ride="carousel" style="margin-top:-25px;;">
                @else
                <div id="carousel-example-1z" class="carousel slide my-2 " data-ride="carousel">
                @endguest
                    <!--Indicators-->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                        <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                    </ol>
                    <!--/.Indicators-->
                    <!--Slides-->
                    <div class="carousel-inner" role="listbox">
                        <!--First slide-->
                        <div class="carousel-item active" >
                            <img class="d-block w-100" src="http://placehold.it/900x250" alt="First slide">
                        </div>
                        <!--/First slide-->
                        <!--Second slide-->
                        <div class="carousel-item">
                                <img class="d-block  w-100" src="http://placehold.it/900x250" alt="Second slide">
                        </div>
                        <!--/Second slide-->
                        <!--Third slide-->
                        <div class="carousel-item">
                                <img class="d-block  w-100" src="http://placehold.it/900x250" alt="Third slide">
                            </div>
                        <!--/Third slide-->
                    </div>
                    <!--/.Slides-->
                    <!--Controls-->
                    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <!--/.Controls-->
                </div>

                <div class="container">

                <!--/.Carousel Wrapper-->
                <div class="row justify-content-left">
                    <div class="col-lg-6 text-left">
                        <div class="section-title">
                            <h3 class="my-4">Produk Unggulan</h3>
                            <p></p>
                        </div>
                    </div>
                </div>

                <div class="row">


                    <!-- single product -->
                    <div class="col-lg-3 col-sm-2-sm-2">
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
                                                    <a class="material-tooltip-main" data-toggle="tooltip"
                                                        data-placement="top" title="Masukan keranjang">
                                                        <i class="fas fa-shopping-cart grey-text ml-3"></i>
                                                    </a>
                                                    <a class="material-tooltip-main" data-toggle="tooltip"
                                                        data-placement="top" title="Tambah Wishlist">
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
                                                <a class="material-tooltip-main" data-toggle="tooltip"
                                                    data-placement="top" title="Masukan keranjang">
                                                    <i class="fas fa-shopping-cart grey-text ml-3"></i>
                                                </a>
                                                <a class="material-tooltip-main" data-toggle="tooltip"
                                                    data-placement="top" title="Tambah Wishlist">
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
</div>
</div>
</div>
@endsection
