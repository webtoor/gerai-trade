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
                                     @foreach ($produk_unggulan as $produk_unggulans)
                                         
                                            <div class="col-lg-3 col-sm-4">
                                        <div class="single-product">
                                                <div class="card">
                                                    <div class="view overlay">
                                                            @if(count($produk_unggulans->produk->produk_image) > 0)
                                                            <img class="card-img-top" src="{{ asset('storage/' .$produk_unggulans->produk->produk_image[0]->image_path)}}" alt="Card image cap" style="height:180px;">
                                                            @else
                                                            <img class="card-img-top" src="http://placehold.it/180x180" alt="Card image cap" style="height:180px;">
                                                            @endif                                                           
                                                        <a href="{{route('produk-detail', ['slug_produk' => $produk_unggulans->produk->slug])}}">
                                                                    <div class="mask rgba-white-slight"></div>
                                                        </a>
                                                    </div>
                                                    <div class="product-details">
                                                            <a href="{{route('produk-detail', ['slug_produk' => $produk_unggulans->produk->slug])}}">

                                                        <!-- Card content -->
                                                        <div class="card-body">

                                                            <!-- Title -->
                                                            <h6 class="card-title" style="margin-top:-10px;">
                                                                {{$produk_unggulans->produk->nama_produk}}
                                                            </h6>
                                                            <!-- Text -->
                                                            <div class="price">
                                                                    <h6>Rp {{number_format($produk_unggulans->produk->harga,0, ".", ".")}}</h6>
                                                                </div>
                                                            </a>
                                                            {{-- <h6 style="color:#AEAEAE;">Jakarta</h6> --}}

                                                 
                                                            <div class="card-footer px-1" style="background:white">
                                                     
                                                                <span class="float-right">
                                                                    
                                                                    <a href="{{ url('/cart-shop/'.$produk_unggulans->produk->id) }}" class="material-tooltip-main"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Masukan keranjang">
                                                                        <i class="fas fa-shopping-cart grey-text ml-3"></i>
                                                                    </a>

                                                                    @if(count(Cart::instance('wishlist')->content()) > 0)
                                                                    <?php $checks = null ?>
        
                                                                    @foreach(Cart::instance('wishlist')->content() as $row)
        
                                                                    @if($produk_unggulans->produk->id == $row->id)
                                                                    <?php $checks = 1 ?>
        
                                                                        <a href="{{ url('/delete-wishlist/'.$row->rowId) }}" class="material-tooltip-main"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Hapus Wishlist">
                                                                            <i class="fas fa-heart pink-text ml-3"></i>
                                                                            </a>
                                                                   
                                                                    @endif
                                                                    @endforeach
        
                                                                    @if($checks == null)
                                                                    <a href="{{ url('/cart-wishlist/'.$produk_unggulans->produk->id) }}" class="material-tooltip-main"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Tambah Wishlist">
                                                                        <i class="fas fa-heart grey-text ml-3"></i>
                                                                    </a>
                                                                    @endif
                                                                    @else
                                                                    <a href="{{ url('/cart-wishlist/'.$produk_unggulans->produk->id) }}" class="material-tooltip-main"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Tambah Wishlist">
                                                                        <i class="fas fa-heart grey-text ml-3"></i>
                                                                    </a>
                                                                    @endif 
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                    
                                    

            </div>
        </div>
    </div>
</div>
</div>
    </div>
</div>
</div>
</div>
{{-- {{Auth::user()->role}} --}}

@endsection
