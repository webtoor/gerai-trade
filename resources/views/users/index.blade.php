@section('css')
<style>
    @media screen and (max-width:700px){
    .maxs{
    max-height: 100%;
    min-height: 100%;
    height: 300px;
    }
    
    }
    @media screen and (max-width:700px){
    .maxs-img{
    max-height: 100%;
    min-height: 100%;
    height: 300px;
    }
    }

    .section-intro p {
    margin-bottom: 3px
}

.section-intro__style {
    border-bottom: 2px solid #384aeb;
    padding-bottom: 8px
}
.card-blog {
    border: 0
}

.card-blog .card-body {
    padding: 25px 25px 25px 0
}

.card-blog__info {
    margin-bottom: 12px;
    margin-left: -20px;
}

.card-blog__info li {
    display: inline-block;
    font-size: 14px;
    color: #999999
}

.card-blog__info li a {
    color: #999999
}

.card-blog__info li i,
.card-blog__info li span {
    margin-right: 5px;
    vertical-align: middle
}

.card-blog__info li:not(:last-child) {
    margin-right: 20px
}

.card-blog__title {
    font-size: 20px;
    margin-bottom: 5px;
    padding-left:20px;
}

.card-blog__title a {
    color: #222;
}


.card-blog__link {
    font-weight: 500;
    color: #222
}

.card-blog__link i,
.card-blog__link span {
    font-size: 13px;
    padding-left: 3px;
    display: inline-block;
    transition: all .5s ease
}

.card-blog:hover .card-blog__title a {
    color: #384aeb
}

.card-blog:hover .card-blog__link {
    color: #384aeb
}

.card-blog:hover .card-blog__link i,
.card-blog:hover .card-blog__link span {
    padding-left: 10px
}

.card-blog__info {
    margin-bottom: 12px
}

.card-blog__info li {
    display: inline-block;
    font-size: 14px;
    color: #999999
}

.card-blog__info li a {
    color: #999999
}

.card-blog__info li i,
.card-blog__info li span {
    margin-right: 5px;
    vertical-align: middle
}

.card-blog__info li:not(:last-child) {
    margin-right: 20px
}
    </style>
@endsection
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
                                            <h3 class="my-4">Produk Terbaru</h3>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                     @foreach ($produk_terbaru as $produk_terbarus)
                                         
                                            <div class="col-lg-3 col-sm-4">
                                        <div class="single-product">
                                                <div class="card">
                                                    <div class="view overlay maxs">
                                                            @if(count($produk_terbarus->produk_image) > 0)
                                                            <img class="img-fluid card-img-top maxs-img" src="{{ asset('storage/' .$produk_terbarus->produk_image[0]->image_path)}}" alt="Card image cap" style="height:230px;">
                                                            @else
                                                            <img class="img-fluid card-img-top maxs-img" src="http://placehold.it/700x700" alt="Card image cap" style="height:230px;">
                                                            @endif                                                           
                                                        <a href="{{route('produk-detail', ['slug_produk' => $produk_terbarus->slug])}}">
                                                                    <div class="mask rgba-white-slight"></div>
                                                        </a>
                                                    </div>
                                                    <div class="product-details">
                                                            <a href="{{route('produk-detail', ['slug_produk' => $produk_terbarus->slug])}}">

                                                        <!-- Card content -->
                                                        <div class="card-body">

                                                            <!-- Title -->
                                                            <h6 class="card-title" style="margin-top:-10px;">
                                                                {{ \Illuminate\Support\Str::limit($produk_terbarus->nama_produk, 26)}}
                                                            </h6>
                                                            <!-- Text -->
                                                            <div class="price" style="margin-top:-10px;">
                                                                    <h6>Rp {{number_format($produk_terbarus->harga,0, ".", ".")}}</h6>
                                                                </div>
                                                                <div>
                                                                <h6 style="color:#90a4ae">{{$produk_terbarus->user->alamat->city_name}}</h6>
                                                                    </div>
                                                            </a>

                                                            @guest
                                                            <div class="card-footer px-1" style="background:white">
                                                                <span class="float-left">
                                                                        <?php $nr = 2;?>
                                                                        @for($i = 0; $i < 5; $i++)
                                                                            <span style="color:#ffc200"><i class="{{ $nr <= $i ? 'far fa-star' : 'fas fa-star' }}" aria-hidden="true"></i></span>
                                                                        @endfor

                                                                </span>

                                                                <span class="float-right">
                                                                        
                                                                    <a href="{{ url('/cart-shop/'.$produk_terbarus->id) }}" class="material-tooltip-main"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Masukan keranjang">
                                                                        <i class="fas fa-shopping-cart grey-text ml-3"></i>
                                                                    </a>

                                                                    @if(count(Cart::instance('wishlist')->content()) > 0)
                                                                    <?php $checks = null ?>
        
                                                                    @foreach(Cart::instance('wishlist')->content() as $row)
        
                                                                    @if($produk_terbarus->id == $row->id)
                                                                    <?php $checks = 1 ?>
        
                                                                        <a href="{{ url('/delete-wishlist/'.$row->rowId) }}" class="material-tooltip-main"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Hapus Wishlist">
                                                                            <i class="fas fa-heart pink-text ml-3"></i>
                                                                            </a>
                                                                   
                                                                    @endif
                                                                    @endforeach
        
                                                                    @if($checks == null)
                                                                    <a href="{{ url('/cart-wishlist/'.$produk_terbarus->id) }}" class="material-tooltip-main"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Tambah Wishlist">
                                                                        <i class="fas fa-heart grey-text ml-3"></i>
                                                                    </a>
                                                                    @endif
                                                                    @else
                                                                    <a href="{{ url('/cart-wishlist/'.$produk_terbarus->id) }}" class="material-tooltip-main"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Tambah Wishlist">
                                                                        <i class="fas fa-heart grey-text ml-3"></i>
                                                                    </a>
                                                                    @endif 

                                                                </span>

                                                            </div>
                                                            @else
                                                            @if(Auth::user()->role->role_id == '2')
                                                            <div class="card-footer px-1" style="background:white">
                                                                    <span class="float-left">
                                                                            <?php $nr = 4;?>
                                                                            @for($i = 0; $i < 5; $i++)
                                                                                <span style="color:#ffc200"><i class="{{ $nr <= $i ? 'far fa-star' : 'fas fa-star' }}" aria-hidden="true"></i></span>
                                                                            @endfor
    
                                                                    </span>
                                                                </div>
                                                            @elseif(Auth::user()->role->role_id == '1')
                                                            <div class="card-footer px-1" style="background:white">
                                                                    <span class="float-left">
                                                                            <?php $nr = 4;?>
                                                                            @for($i = 0; $i < 5; $i++)
                                                                                <span style="color:#ffc200"><i class="{{ $nr <= $i ? 'far fa-star' : 'fas fa-star' }}" aria-hidden="true"></i></span>
                                                                            @endfor
                                                                    </span>
    
                                                                    <span class="float-right">
                                                                            
                                                                        <a href="{{ url('/cart-shop/'.$produk_terbarus->id) }}" class="material-tooltip-main"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Masukan keranjang">
                                                                            <i class="fas fa-shopping-cart grey-text ml-3"></i>
                                                                        </a>
    
                                                                        @if(count(Cart::instance('wishlist')->content()) > 0)
                                                                        <?php $checks = null ?>
            
                                                                        @foreach(Cart::instance('wishlist')->content() as $row)
            
                                                                        @if($produk_terbarus->id == $row->id)
                                                                        <?php $checks = 1 ?>
            
                                                                            <a href="{{ url('/delete-wishlist/'.$row->rowId) }}" class="material-tooltip-main"
                                                                                data-toggle="tooltip" data-placement="top"
                                                                                title="Hapus Wishlist">
                                                                                <i class="fas fa-heart pink-text ml-3"></i>
                                                                                </a>
                                                                       
                                                                        @endif
                                                                        @endforeach
            
                                                                        @if($checks == null)
                                                                        <a href="{{ url('/cart-wishlist/'.$produk_terbarus->id) }}" class="material-tooltip-main"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Tambah Wishlist">
                                                                            <i class="fas fa-heart grey-text ml-3"></i>
                                                                        </a>
                                                                        @endif
                                                                        @else
                                                                        <a href="{{ url('/cart-wishlist/'.$produk_terbarus->id) }}" class="material-tooltip-main"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Tambah Wishlist">
                                                                            <i class="fas fa-heart grey-text ml-3"></i>
                                                                        </a>
                                                                        @endif 
    
                                                                    </span>
    
                                                                </div>
                                                            @endif
                                                            
                                                            @endguest
                                                        </div>
                                                    </div>
                                                    
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                    
                                    

            </div>
            
        </div>
        <section class="blog section_gap" style="padding-bottom:100px;">
            <div class="container">
              <div class="section-intro pb-20px" style="padding-bottom:40px;">
                <h2>Info <span class="section-intro__style">Terbaru</span></h2> 
              </div>
        
              <div class="row">
                  @foreach($blog as $blogs)
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0" style="padding-bottom:50px;">
                  <div class="card card-blog">
                    <div class="card-blog__img">
                        
                      <img class="card-img rounded-0" src="{{ asset('storage/' .$blogs->image)}}" alt="" style="height:200px;">
                    </div>
                    <div class="card-body">
                      <ul class="card-blog__info">
                        <li><a href="#">By {{$blogs->user->nama_depan}}</a></li>
                        <li><a href="#"><i class="ti-comments-smiley"></i> {{ date("j-M-Y", strtotime($blogs->created_at))}}</a></li>
                      </ul>
                      <h4 class="card-blog__title"><a href="{{ url('single/'.$blogs->slug) }}">{{$blogs->judul}}</a></h4>
                      <div style="padding-left:20px; height:100px;">
                        {!! \Illuminate\Support\Str::limit($blogs->konten, 100) !!}
                        </div>
                      <a class="card-blog__link" href="{{ url('single/'.$blogs->slug) }}" style="padding-left:20px">Read More <i class="ti-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </section>  
    </div>
</div>
</div>
    </div>
</div>
</div>

</div>

<footer class="ftco-footer ftco-section" style="background-color:#f8f9fa">
    @include('users.partials.footer');
</footer> 


@endsection
