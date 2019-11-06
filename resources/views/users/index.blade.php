@extends('users.default')

@section('content')


<div class="single-product-slider">
    @guest
    <div style="width: 100%;">
       
        @else
        <div class="container-fluid">
            @endguest

                @guest
                @else
                <div class="row">
                @include('users.partials.sidebar')
                @endguest
                

                @guest
                <div class="col-sm-16">
                    @else
                    <div class="col-sm-10">
                        @endguest
                        <!--Carousel Wrapper-->

                        @guest
                        <div id="carousel-example-1z" class="carousel slide" data-ride="carousel"
                            style="margin-top:-25px;">
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
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="img/banner/banner_2.jpg" alt="First slide">
                                    </div>
                                    <!--/First slide-->
                                    <!--Second slide-->
                                    <div class="carousel-item">
                                        <img class="d-block  w-100" src="img/banner/banner_4.jpg"
                                            alt="Second slide">
                                    </div>
                                    <!--/Second slide-->
                                    <!--Third slide-->
                                    <div class="carousel-item">
                                        <img class="d-block  w-100" src="img/banner/banner_1.jpg" alt="Third slide">
                                    </div>
                                    <!--/Third slide-->
                                </div>
                                <!--/.Slides-->
                                <!--Controls-->
                                <a class="carousel-control-prev" href="#carousel-example-1z" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-example-1z" role="button"
                                    data-slide="next">
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
                                        <?php
                                        for ($x = 0; $x <= 11; $x++) { 
                                            
                                            ?>
                                            <div class="col-lg-3 col-sm-4">
                                        <div class="single-product">
                                            <a href="single-product.html">
                                                <div class="card">
                                                    <div class="view overlay">
                                                        <img class="card-img-top" src="img/produk/produk_default.jpg"
                                                            alt="Card image cap">
                                                        <a href="#!">
                                                            <div class="mask rgba-white-slight"></div>
                                                        </a>
                                                    </div>
                                                    <div class="product-details">
                                                        <!-- Card content -->
                                                        <div class="card-body">

                                                            <!-- Title -->
                                                            <h6 class="card-title" style="margin-top:-10px;">Nama Produk
                                                            </h6>
                                                            <!-- Text -->
                                                            <div class="price">
                                                                <h6>Rp 150.000</h6>
                                                            </div>

                                                            <h6 style="color:#AEAEAE;">Jakarta</h6>

                                                 
                                                            <div class="card-footer px-1" style="background:white">
                                                     
                                                                <span class="float-right">
                                                                    <a class="material-tooltip-main"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Masukan keranjang">
                                                                        <i
                                                                            class="fas fa-shopping-cart grey-text ml-3"></i>
                                                                    </a>
                                                                    <a class="material-tooltip-main"
                                                                        data-toggle="tooltip" data-placement="top"
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

                                      <?php  }
                                        ?>
                                    

            </div>
        </div>
    </div>
</div>
</div>
    </div>
</div></div>
</div>
{{-- {{Auth::user()->role}} --}}

@endsection
