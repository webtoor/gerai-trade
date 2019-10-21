@extends('users.default')
@section('content')
<div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Produk Unggulan</h1>
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
            
        </div>
    </div>
    
    
    <div class="container mt-5">
    
    
        <!--Section: Content-->
        <section class="mx-md-5 dark-grey-text text-center">
    
            <!-- Section heading -->
            <h3 class="font-weight-bold mb-4 pb-2">Our bestsellers</h3>
            <!-- Section description -->
            <p class="grey-text w-responsive mx-auto mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit fugit,
                error amet numquam iure provident voluptate esse quasi nostrum quisquam eum porro a pariatur veniam.</p>
    
            <!-- Grid row -->
            <div class="row">
    
                <!-- Grid column -->
                <div class="col-lg-3 col-md-6">
                    <!-- Card -->
                    <div class="card card-cascade narrower card-ecommerce">
                        <!-- Card image -->
                        <div class="view view-cascade overlay">
                            <img class="img-fluid" src="images/produk/a3.jpg" alt="">
    
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!-- Card image -->
                        <!-- Card content -->
                        <div class="card-body card-body-cascade text-center pb-3">
                            <!-- Title -->
                            <h5 class="card-title mb-1">
                                <strong>
                                    <a href="">Denim trousers</a>
                                </strong>
                            </h5>
                            <!--Rating-->
    
                            <!-- Description -->
                            <p class="card-text">Neque porro quisquam est, qui dolorem ipsum quia dolor sit.
                            </p>
                            <!-- Card footer -->
                            <div class="card-footer px-1">
                                <span class="float-left font-weight-bold">
                                    <strong>49$</strong>
                                </span>
                                <span class="float-right">
                                    <a class="material-tooltip-main" data-toggle="tooltip" data-placement="top"
                                        title="Add to Cart">
                                        <i class="fas fa-shopping-cart grey-text ml-3"></i>
                                    </a>
                                    <a class="material-tooltip-main" data-toggle="tooltip" data-placement="top"
                                        title="Add to Wishlist">
                                        <i class="fas fa-heart grey-text ml-3"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <!-- Card content -->
                    </div>
                    <!-- Card -->
                </div>
                <!-- Grid column -->
    
                <!-- Grid column -->
    
            </div>
            <!-- Grid row -->
    
        </section>
        <!--Section: Content-->
    </div>
    
@endsection