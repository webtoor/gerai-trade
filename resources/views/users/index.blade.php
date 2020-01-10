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
/*------------------
  Header section
---------------------*/

.header-top {
	padding: 18px 0 14px;
}

.site-logo {
	display: inline-block;
}

.header-search-form {
	width: 100%;
	position: relative;
	padding: 0 10px;
}

.header-search-form input {
	width: 100%;
	height: 44px;
	font-size: 14px;
	border-radius: 50px;
	border: none;
	padding: 0 19px;
	background: #f0f0f0;
}

.header-search-form button {
	position: absolute;
	height: 100%;
	right: 18px;
	top: 0;
	font-size: 26px;
	color: #000;
	border: none;
	cursor: pointer;
	background-color: transparent;
}

.user-panel .up-item {
	display: inline-block;
	font-size: 14px;
}

.user-panel .up-item i {
	font-size: 22px;
}

.user-panel .up-item a {
	font-size: 14px;
	color: #000;
}

.user-panel .up-item:first-child {
	margin-right: 29px;
}

.shopping-card {
	display: inline-block;
	position: relative;
}

.shopping-card span {
	position: absolute;
	top: -4px;
	left: 100%;
	height: 16px;
	min-width: 16px;
	color: #fff;
	font-size: 13px;
	background: #f51167;
	text-align: center;
	border-radius: 30px;
	padding: 0 2px;
	margin-left: -7px;
}

.main-navbar {
	background: #282828;
}

.slicknav_menu {
	display: none;
}

.main-menu {
	list-style: none;
}

.main-menu li {
	display: inline-block;
	position: relative;
}

.main-menu li a {
	display: inline-block;
	font-size: 16px;
	color: #ffffff;
	margin-right: 50px;
	line-height: 1;
	padding: 17px 0;
	position: relative;
}

.main-menu li a .new {
	position: absolute;
	top: -8px;
	font-size: 10px;
	font-weight: 700;
	color: #fff;
	background: #f51167;
	line-height: 1;
	text-transform: uppercase;
	left: calc(50% - 21px);
	padding: 5px 9px 1px;
	border-radius: 15px;
	width: 42px;
}

.main-menu li:hover .sub-menu {
	visibility: visible;
	opacity: 1;
	margin-top: 0;
}

.main-menu li:hover>a {
	color: #f51167;
}

.main-menu .sub-menu {
	position: absolute;
	list-style: none;
	width: 220px;
	left: 0;
	top: 100%;
	padding: 20px 0;
	visibility: hidden;
	opacity: 0;
	margin-top: 50px;
	background: #fff;
	z-index: 99;
	-webkit-transition: all 0.4s;
	-o-transition: all 0.4s;
	transition: all 0.4s;
	-webkit-box-shadow: 2px 7px 20px rgba(0, 0, 0, 0.05);
	box-shadow: 2px 7px 20px rgba(0, 0, 0, 0.05);
}

.main-menu .sub-menu li {
	display: block;
}

.main-menu .sub-menu li a {
	display: block;
	color: #000;
	margin-right: 0;
	padding: 8px 20px;
}

.main-menu .sub-menu li a:hover {
	color: #f51167;
}

.nav-switch {
	display: none;
}

/* ----------------
  Features
---------------------*/

.hero-section {
	padding-bottom: 54px;
}

.hero-slider .hs-item {
	position: relative;
	height: 720px;
}

.hero-slider .hs-item span {
	font-size: 18px;
	text-transform: uppercase;
	font-weight: 600;
	letter-spacing: 3px;
	margin-bottom: 5px;
	display: block;
	position: relative;
	top: 50px;
	opacity: 0;
}

.hero-slider .hs-item h2 {
	font-size: 60px;
	text-transform: uppercase;
	font-weight: 700;
	margin-bottom: 10px;
	position: relative;
	top: 50px;
	opacity: 0;
}

.hero-slider .hs-item p {
	font-size: 18px;
	font-weight: 300;
	margin-bottom: 35px;
	position: relative;
	top: 100px;
	opacity: 0;
}

.hero-slider .hs-item .site-btn {
	position: relative;
	top: 50px;
	opacity: 0;
}

.hero-slider .hs-item .sb-line {
	margin-right: 5px;
}

.hero-slider .hs-item .container {
	position: relative;
	padding-top: 170px;
}

.hero-slider .hs-item .offer-card {
	position: absolute;
	right: 0;
	top: 226px;
	width: 162px;
	height: 162px;
	border-radius: 50%;
	background: #f51167;
	text-align: center;
	padding-top: 20px;
	-webkit-transform: rotate(45deg);
	-ms-transform: rotate(45deg);
	transform: rotate(45deg);
	opacity: 0;
}

.hero-slider .hs-item .offer-card:after {
	position: absolute;
	content: "";
	width: calc(100% - 10px);
	height: calc(100% - 10px);
	border: 1px solid #f96790;
	left: 5px;
	top: 5px;
	border-radius: 50%;
}

.hero-slider .hs-item .offer-card span {
	font-size: 18px;
	text-transform: lowercase;
	position: relative;
	top: 50px;
	opacity: 0;
}

.hero-slider .hs-item .offer-card h2 {
	font-size: 72px;
	font-weight: 400;
	line-height: 1;
}

.hero-slider .hs-item .offer-card p {
	text-transform: uppercase;
	line-height: 1;
	font-size: 14px;
}

.hero-slider .slider-nav-warp {
	max-width: 1145px;
	bottom: 0;
	margin: -78px auto 0;
}

.hero-slider .slider-nav {
	display: inline-block;
	padding: 0 38px;
	position: relative;
}

.hero-slider .owl-dots {
	display: -ms-flex;
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	padding-top: 9px;
}

.hero-slider .owl-dots .owl-dot {
	width: 8px;
	height: 8px;
	background: #fff;
	border-radius: 15px;
	margin-right: 10px;
	opacity: 0.25;
}

.hero-slider .owl-dots .owl-dot.active {
	opacity: 1;
}

.hero-slider .owl-dots .owl-dot:last-child {
	margin-right: 0;
}

.hero-slider .owl-nav button.owl-next,
.hero-slider .owl-nav button.owl-prev {
	font-size: 27px;
	position: absolute;
	color: #fff;
	opacity: 0.5;
	bottom: -20px;
}

.hero-slider .owl-nav button.owl-next {
	right: 0;
}

.hero-slider .owl-nav button.owl-prev {
	left: 0;
}

.hero-slider .owl-item.active .hs-item h2,
.hero-slider .owl-item.active .hs-item span,
.hero-slider .owl-item.active .hs-item p,
.hero-slider .owl-item.active .hs-item .site-btn {
	top: 0;
	opacity: 1;
}

.hero-slider .owl-item.active .hs-item span {
	-webkit-transition: all 0.5s ease 0.2s;
	-o-transition: all 0.5s ease 0.2s;
	transition: all 0.5s ease 0.2s;
}

.hero-slider .owl-item.active .hs-item h2 {
	-webkit-transition: all 0.5s ease 0.4s;
	-o-transition: all 0.5s ease 0.4s;
	transition: all 0.5s ease 0.4s;
}

.hero-slider .owl-item.active .hs-item p {
	-webkit-transition: all 0.5s ease 0.6s;
	-o-transition: all 0.5s ease 0.6s;
	transition: all 0.5s ease 0.6s;
}

.hero-slider .owl-item.active .hs-item .site-btn {
	-webkit-transition: all 0.5s ease 0.8s;
	-webkit-transition: all 0.5s ease 0.8s;
	-o-transition: all 0.5s ease 0.8s;
	transition: all 0.5s ease 0.8s;
}

.hero-slider .owl-item.active .hs-item .offer-card {
	opacity: 1;
	-webkit-transform: rotate(0deg);
	-ms-transform: rotate(0deg);
	transform: rotate(0deg);
	-webkit-transition: all 0.5s ease 1s;
	-webkit-transition: all 0.5s ease 1s;
	-o-transition: all 0.5s ease 1s;
	transition: all 0.5s ease 1s;
}

.slide-num-holder {
	float: right;
	z-index: 1;
	color: #fff;
	position: relative;
	font-size: 24px;
	font-weight: 700;
	position: relative;
	margin-top: -22px;
}

.slide-num-holder span:first-child {
	margin-right: 41px;
}

.slide-num-holder:after {
	position: absolute;
	content: "";
	height: 30px;
	width: 1px;
	background: #fff;
	left: 50%;
	top: 0;
	-webkit-transform-origin: center;
	-ms-transform-origin: center;
	transform-origin: center;
	-webkit-transform: rotate(30deg);
	-ms-transform: rotate(30deg);
	transform: rotate(30deg);
}

/* ------------------
  Features section
---------------------*/

.feature {
	text-align: center;
	background: #f8f8f8;
	height: 100%;
}

.feature:nth-child(2) {
	background: #f51167;
}

.feature:nth-child(2) h2 {
	color: #fff;
}

.feature .feature-inner {
	padding: 20px 25px;
	display: -ms-flex;
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-align: center;
	-ms-flex-align: center;
	align-items: center;
	-webkit-box-pack: center;
	-ms-flex-pack: center;
	justify-content: center;
	height: 100%;
}

.feature .feature-icon {
	display: inline-block;
	margin-right: 15px;
}

.feature h2 {
	font-size: 24px;
	text-transform: uppercase;
	display: inline-block;
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
                            style="margin-top:0px;">
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
                                        <img class="d-block w-100" src="img/banner/banner_a12.jpg" alt="First slide">
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
                                                                        <?php $nr = $produk_terbarus->rating;?>
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
                                                                        <?php $nr = $produk_terbarus->rating?>
                                                                        @for($i = 0; $i < 5; $i++)
                                                                                <span style="color:#ffc200"><i class="{{ $nr <= $i ? 'far fa-star' : 'fas fa-star' }}" aria-hidden="true"></i></span>
                                                                            @endfor
    
                                                                    </span>
                                                                </div>
                                                            @elseif(Auth::user()->role->role_id == '1')
                                                            <div class="card-footer px-1" style="background:white">
                                                                    <span class="float-left">
                                                                            <?php $nr = $produk_terbarus->rating?>
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
