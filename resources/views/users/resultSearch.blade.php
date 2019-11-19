@section('css')
<link rel="stylesheet" type="text/css" href="../css/banner.css">
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
</style>
@endsection
@extends('users.default')

@section('content')
<section class="banner-area organic-breadcrumb" style="margin-top:-30px;">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                <div class="col-first">
                    <h1>Pencarian Produk</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container" style="margin-top:-40px;">
            @if(count($produk))

            <div class="d-flex flex-wrap align-items-center">
                    <div class="sorting" style="font-size:13px;">
                            Menampilkan {{$produk->total()}} produk untuk 
                           "{{$filter}}"
                            ({{$produk->firstItem()}} - {{$produk->lastItem()}} dari {{$produk->total()}} )
                    </div>
                    <div class="ml-auto">
                           <label style="margin-top:10px; margin-right:20px; color:black; font-weight:bold;">Urutkan : </label>
                    </div>
                <div class="sorting">
                        <select id="sort" class="form-control">
                                <option value="/p/search?filter={{$filter}}&sort=desc" {{ ( $sort == 'desc') ? 'selected' : '' }}>Produk Terbaru</option>
                                <option value="/p/search?filter={{$filter}}&sort=murah" {{ ( $sort == 'murah') ? 'selected' : '' }}>Harga Termurah</option>
                                <option value="/p/search?filter={{$filter}}&sort=mahal" {{ ( $sort == 'mahal') ? 'selected' : '' }}>Harga Termahal</option>
                    </select>
                </div>
                
            </div>
        <section class=" pb-40" style="margin-top:20px;">
                <div class="row">

                    @foreach ($produk as $produk_item)
                        
                    <div class="col-lg-3 col-sm-4">
                            <div class="single-product">
                            <div class="card">
                                <div class="view overlay maxs">
                                    @if(count($produk_item->produk_image) > 0)
                                    <img class="card-img-top maxs-img" src="{{ asset('storage/' .$produk_item->produk_image[0]->image_path)}}" alt="Card image cap" style="height:230px;">
                                    @else
                                    <img class="card-img-top maxs-img" src="http://placehold.it/180x180" alt="Card image cap" style="height:230px;">
                                    @endif                                  
                                    <a href="{{route('produk-detail', ['slug_produk' => $produk_item->slug])}}">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                <div class="product-details">
                                <a href="{{route('produk-detail', ['slug_produk' => $produk_item->slug])}}">

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
                                    </a>
                                        <div class="card-footer px-1" style="background:white">
                                    
                                            <span class="float-right">
                                                <a href="{{ url('/cart-shop/'.$produk_item->id) }}" class="material-tooltip-main"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Masukan keranjang">
                                                    <i class="fas fa-shopping-cart grey-text ml-3"></i>
                                                </a>
                                                @if(count(Cart::instance('wishlist')->content()) > 0)
                                                <?php $checks = null ?>

                                                @foreach(Cart::instance('wishlist')->content() as $row)

                                                @if($produk_item->id == $row->id)
                                                <?php $checks = 1 ?>

                                                    <a href="{{ url('/delete-wishlist/'.$row->rowId) }}" class="material-tooltip-main"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Hapus Wishlist">
                                                        <i class="fas fa-heart pink-text ml-3"></i>
                                                        </a>
                                               
                                                @endif
                                                @endforeach

                                                @if($checks == null)
                                                <a href="{{ url('/cart-wishlist/'.$produk_item->id) }}" class="material-tooltip-main"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Tambah Wishlist">
                                                    <i class="fas fa-heart grey-text ml-3"></i>
                                                </a>
                                                @endif
                                                @else
                                                <a href="{{ url('/cart-wishlist/'.$produk_item->id) }}" class="material-tooltip-main"
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
            @else
            <div class="text-center">
                Maaf barang yang Anda cari tidak tersedia <i class="far fa-sad-cry"></i>
            </div>
            @endif
        </div>
    </section>
    <div class="filter-bar d-flex flex-wrap align-items-center">
            <div class="pagination ml-auto">
                {{-- {{$produk->links()}} --}}
                {{ $produk->appends(['filter' => $filter, 'sort' => $sort])->links() }}

            </div>
        </div>
        <br>
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