@section('css')
<link rel="stylesheet" type="text/css" href="../css/banner.css">
<style>
    .sidebar-categories .head {
  line-height: 60px;
 
  background-image: -moz-linear-gradient(45deg, #3f51b5 0%, #0277bd 45%, #03a9f4 100%);
  background-image: -webkit-linear-gradient(45deg, #3f51b5 0%, #0277bd 45%, #03a9f4 100%);
  background-image: -ms-linear-gradient(45deg, #3f51b5 0%, #0277bd 45%, #03a9f4 100%);
  padding: 0 30px;
  font-size: 16px;
  font-weight: 400;
  color: white; }
.sidebar-categories .main-categories {
  padding: 0 20px;
  background: #fff;
  box-shadow: 0 10px 10px rgba(153, 153, 153, 0.1);
 }
.sidebar-categories .main-nav-list a {
  font-size: 14px;
  font-weight: bold;
  display: block;
  line-height: 50px;
  padding-left: 10px;
  border-bottom: 1px solid #eee; }
  .sidebar-categories .main-nav-list a:hover {
    color: #3f51b5; }
  .sidebar-categories .main-nav-list a .number {
    color: #cccccc;
    margin-left: 10px; }
  .sidebar-categories .main-nav-list a .lnr {
    margin-right: 10px;
    display: none; }
.sidebar-categories .main-nav-list.child a {
  padding-left: 32px; }
  .main-categories a {
  color: #000; }

  .pagination {
  margin-top: 10px;
  border-left: 1px solid #eee;
  border-radius: 0px; }
  .pagination a {
    width: 40px;
    line-height: 40px;
    text-align: center;
    display: inline-block;
    background: #fff; }
    .pagination a.active {
      color: #fff; }
    .pagination a:hover {
      color: #fff; }
  .pagination .dot-dot {
    width: auto;
    background: transparent;
    border-top: 0px;
    border-bottom: 0px;
    color: #cccccc;
    padding: 0 5px; }
    .pagination .dot-dot:hover {
      background: transparent;
      border: 0px;
      border-right: 1px solid #eee;
      color: #cccccc; }
  .sorting {
  margin-top: 10px;
  margin-right: 10px; }
  .sorting .nice-select {
    border-radius: 0px;
    border: 1px solid #eee;
    padding-right: 50px; }
    .sorting .nice-select:after {
      right: 18px; }
    .sorting .nice-select .list {
      border-radius: 0px; }
</style>
@endsection
@extends('users.default')

@section('content')
 <!-- Start Banner Area -->
 <section class="banner-area organic-breadcrumb" style="margin-top:-50px;">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
            <div class="col-first">
                <h1>Kategori Produk</h1>
                 <nav class="d-flex align-items-center justify-content-start">
                     @if($kategori_menu->kategori)
                 <a href="#">{{$kategori_menu->kategori->kategori_name}}<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    <a href="#">{{$kategori_menu->subkategori_name}}</a>
                    @else
                    <a href="#">{{$kategori_menu->kategori_name}}</a>
                    @endif
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->


    <div class="container-fluid" style="padding-bottom:30px;">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="sidebar-categories">
            <div class="head">Kategori</div>
            <ul class="main-categories" style="list-style-type:none;">
                @foreach ($kategori as $kategories)

                @if(count($kategories->sub_kategori) == 0 )
                <li class="main-nav-list"><a data-toggle="collapse" href="#Alat aria-expanded="false" aria-controls="Alat"><span
                    class="lnr lnr-arrow-right"></span>{{$kategories->kategori_name}}</a>
              </li>
                @else
                
                <li class="main-nav-list" >
                    <a data-toggle="collapse" href="#{{$kategories->slug}}" aria-expanded="false" aria-controls="{{$kategories->slug}}">
                        <span
                         class="lnr lnr-arrow-right"></span>{{$kategories->kategori_name}}</a>
                    <ul style="list-style-type:none;" class="collapse" id="{{$kategories->slug}}" data-toggle="collapse" aria-expanded="false" aria-controls="{{$kategories->slug}}">
                            @foreach ($kategories->sub_kategori as $sub_kategories)

                        <li class="main-nav-list child"><a href="#" >{{$sub_kategories->subkategori_name}}</a></li>
                        @endforeach

                    </ul>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <!-- Start Filter Bar -->
      
                    <div class="filter-bar d-flex flex-wrap align-items-center">
                            <div class="sorting">
                                    Menampilkan 1 produk untuk "perlengkapan medis" (1 - 60 dari 1.103.574)
                            </div>
                            <div class="ml-auto">
                                   <label style="margin-top:20px; margin-right:20px; color:black; font-weight:bold;">Urutkan : </label>
                            </div>
                        <div class="sorting">
                                <select class="form-control">
                                <option value="1">Produk Terbaru</option>
                            </select>
                        </div>
                        
                    </div>
                    <!-- End Filter Bar -->
                    <!-- Start Best Seller -->
                    <section class=" pb-40" style="margin-top:30px;">
                        <div class="row">
                            <?php
                            for ($x = 0; $x <= 11; $x++) { 
                                
                                ?>
                                <div class="col-lg-3 col-sm-4">
                            <div class="single-product">
                                <a href="single-product.html">
                                    <div class="card">
                                        <div class="view overlay">
                                            <img class="card-img-top" src="/img/produk/produk_default.jpg"
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
                    </section>
                    <!-- End Best Seller -->
                    <!-- Start Filter Bar -->
                    <div class="filter-bar d-flex flex-wrap align-items-center">
                        <div class="pagination ml-auto">
                            <a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                            <a href="#" class="active">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                            <a href="#">6</a>
                            <a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <!-- End Filter Bar -->
                </div>
            </div>
        </div>
@endsection
