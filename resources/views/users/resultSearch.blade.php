@section('css')
<link rel="stylesheet" type="text/css" href="../css/banner.css">
@endsection
@extends('users.default')

@section('content')
<section class="banner-area organic-breadcrumb" style="margin-top:-50px;">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                <div class="col-first">
                    <h1>Pencarian Produk</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container" style="margin-top:-50px;">
            <div class="d-flex flex-wrap align-items-center">
                    <div class="sorting">
                            Menampilkan {{$produk->total()}} produk untuk 
                           "{{$filter}}"
                            ({{$produk->firstItem()}} - {{$produk->lastItem()}} dari {{$produk->total()}} )
                    </div>
                    <div class="ml-auto">
                           <label style="margin-top:10px; margin-right:20px; color:black; font-weight:bold;">Urutkan : </label>
                    </div>
                <div class="sorting">
                        <select id="sort" class="form-control">
                        <option value="">Produk Terbaru</option>
                        <option value="">Harga Termurah</option>
                        <option value="">Harga Termahal</option>
                    </select>
                </div>
                
            </div>
        <section class=" pb-40" style="margin-top:20px;">
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
</div>
@endsection