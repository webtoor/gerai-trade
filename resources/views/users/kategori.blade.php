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


    <div class="container-fluid" style="margin-top:-50px; padding-bottom:30px;">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="sidebar-categories">
            <div class="head">Kategori</div>
            <ul class="main-categories" style="list-style-type:none;">
                @foreach ($kategori as $kategories)

                @if(count($kategories->sub_kategori) < 1 )
                <li class="main-nav-list"><a href="{{ url('k/'.$kategories->slug) }}" aria-expanded="false" aria-controls="Alat"><span
                    class="lnr lnr-arrow-right"></span>{{$kategories->kategori_name}}</a>
              </li>
                @else
                
                <li class="main-nav-list" >
                    <a data-toggle="collapse" href="#{{$kategories->slug}}" aria-expanded="false" aria-controls="{{$kategories->slug}}">
                        <span
                         class="lnr lnr-arrow-right"></span>{{$kategories->kategori_name}}</a>
                         @if($kategori_menu->kategori)

                         <ul style="list-style-type:none;" class="{{ ( ($kategori_menu->kategori->slug) == ($kategories->slug)) ? "collapse show" : "collapse"}} "id="{{$kategories->slug}}" data-toggle="collapse" aria-expanded="false" aria-controls="{{$kategories->slug}}">
                        @else
                        <ul style="list-style-type:none;" class="collapse" id="{{$kategories->slug}}" data-toggle="collapse" aria-expanded="false" aria-controls="{{$kategories->slug}}">

                        @endif
                        @foreach ($kategories->sub_kategori as $sub_kategories)

                        <li class="main-nav-list child"><a href="{{ url('k/'.$sub_kategories->slug) }}" >{{$sub_kategories->subkategori_name}}</a></li>
                        @endforeach

                    </ul>
                </li>
                @else
                <div class="text-center">
                    Maaf, produk dalam kategeri ini masih kosong <i class="far fa-sad-cry"></i>
                </div>
                @endif
                @endforeach
            </ul>
        </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <!-- Start Filter Bar -->
                    @if(count($produk))
                    <div class="filter-bar d-flex flex-wrap align-items-center">
                            <div class="sorting">
                                    Menampilkan {{$produk->total()}} produk untuk 
                                    @if($kategori_menu->kategori)
                                    {{$kategori_menu->subkategori_name}}
                                    @else
                                    {{$kategori_menu->kategori_name}}
                                    @endif
                                    ({{$produk->firstItem()}} - {{$produk->lastItem()}} dari {{$produk->total()}} )
                            </div>
                            <div class="ml-auto">
                                   <label style="margin-top:20px; margin-right:20px; color:black; font-weight:bold;">Urutkan : </label>
                            </div>
                        <div class="sorting">
                                <select id="sort" class="form-control">
                                <option value="/k/{{$kategori_menu->slug}}?sort=desc" {{ ( $sort == 'desc') ? 'selected' : '' }}>Produk Terbaru</option>
                                <option value="/k/{{$kategori_menu->slug}}?sort=murah" {{ ( $sort == 'murah') ? 'selected' : '' }}>Harga Termurah</option>
                                <option value="/k/{{$kategori_menu->slug}}?sort=mahal" {{ ( $sort == 'mahal') ? 'selected' : '' }}>Harga Termahal</option>
                            </select>
                        </div>
                        
                    </div>
                    <!-- End Filter Bar -->
                    <!-- Start Best Seller -->
                    <section class=" pb-40" style="margin-top:30px;">
                        <div class="row">
                            @foreach ($produk as $produk_item)
                                
                                <div class="col-lg-3 col-sm-4">
                            <div class="single-product">
                                <a href="single-product.html">
                                    <div class="card">
                                        <div class="view overlay">
                                            <img class="card-img-top" src="/img/produk/produk_default.jpg" alt="Card image cap">
                                            <a href="#!">
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                        </div>
                                        <div class="product-details">
                                            <!-- Card content -->
                                            <div class="card-body">

                                                <!-- Title -->
                                                <h6 class="card-title" style="margin-top:-10px;">{{$produk_item->nama_produk}}
                                                </h6>
                                                <!-- Text -->
                                                <div class="price">
                                                    <h6>Rp {{number_format($produk_item->harga,0, ".", ".")}}</h6>
                                                </div>

                                                {{-- <h6 style="color:#AEAEAE;">Jakarta</h6> --}}

                                     
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

                    @endforeach

                        

                </div>
                    </section>
                    <!-- End Best Seller -->
                    <!-- Start Filter Bar -->
                    <div class="filter-bar d-flex flex-wrap align-items-center">
                        <div class="pagination ml-auto">
                            {{-- {{$produk->links()}} --}}
                            {{ $produk->appends(['sort' => $sort])->links() }}

                        </div>
                    </div>
                    @endif
                    <!-- End Filter Bar -->
                </div>
            </div>
        </div>
@endsection
@section('js')
<script>
$(document).ready(function () {
$('select#sort').on('change', function (e) {
let optionSelected = $("option:selected", this);
let valueSelected = this.value;
window.location = valueSelected;

console.log(valueSelected)
});
});
</script>
@endsection