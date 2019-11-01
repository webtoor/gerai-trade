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
            </div>
        </div>
@endsection
