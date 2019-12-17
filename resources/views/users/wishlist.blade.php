@extends('users.default')

@section('content')
<div class="container-fluid">
    <div class="row">
    @include('users.partials.sidebar')
    <div class="col-sm-10">

    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top:10px;">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#wishlist" role="tab" aria-controls="wishlist" aria-selected="true">Wishlist</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="wishlist" role="tabpanel" aria-labelledby="wishlist-tab">
                    @if(count($wishlist))

                    <div class="row" style="margin-top:50px;">
                            @foreach ($wishlist as $wishlists)
                                
                                   <div class="col-lg-3 col-sm-4">
                               <div class="single-product">
                                       <div class="card">
                                           <div class="view overlay">
                                                   @if(count($wishlists->produk_image) > 0)
                                                   <img class="card-img-top" src="{{ asset('storage/' .$wishlists->produk_image[0]->image_path)}}" alt="Card image cap" style="height:180px;">
                                                   @else
                                                   <img class="card-img-top" src="http://placehold.it/180x180" alt="Card image cap" style="height:180px;">
                                                   @endif                                                           
                                               <a href="{{route('produk-detail', ['slug_produk' => $wishlists->slug])}}">
                                                           <div class="mask rgba-white-slight"></div>
                                               </a>
                                           </div>
                                           <div class="product-details">
                                                   <a href="{{route('produk-detail', ['slug_produk' => $wishlists->slug])}}">

                                               <!-- Card content -->
                                               <div class="card-body">

                                                   <!-- Title -->
                                                   <h6 class="card-title" style="margin-top:-10px;">
                                                       {{$wishlists->nama_produk}}
                                                   </h6>
                                                   <!-- Text -->
                                                   <div class="price">
                                                           <h6>Rp {{number_format($wishlists->harga,0, ".", ".")}}</h6>
                                                       </div>
                                                   </a>
                                                   {{-- <h6 style="color:#AEAEAE;">Jakarta</h6> --}}

                                        
                                                   <div class="card-footer px-1" style="background:white">
                                                    <span class="float-left">
                                                        <?php $nr = 4;?>
                                                        @for($i = 0; $i < 5; $i++)
                                                            <span style="color:#ffc200"><i class="{{ $nr <= $i ? 'far fa-star' : 'fas fa-star' }}" aria-hidden="true"></i></span>
                                                        @endfor
                                                    </span>
                                                       <span class="float-right">
                                                           @foreach(Cart::instance('wishlist')->content() as $row)
                                                           @if($wishlists->id == $row->id)
                                                           <a href="{{ url('/cart-shop/'.$wishlists->id) }}" class="material-tooltip-main"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Masukan keranjang">
                                                               <i class="fas fa-shopping-cart grey-text ml-3"></i>
                                                           </a>

                                                           <a href="{{ url('/delete-wishlist/'.$row->rowId) }}" class="material-tooltip-main"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Hapus Wishlist">
                                                               <i class="fas fa-heart pink-text ml-3"></i>
                                                           </a>
                                                           @endif
                                                           @endforeach
                                                       </span>
                                                   </div>
                                               </div>
                                           </div>
                               </div>
                           </div>
                       </div>
                       @endforeach
                     
                           
                           

                </div>
                @else
                <div class="text-center" style="margin-top:100px;">
                    <p>Wah, Wishlist Anda kosong nih </p>
                    <a href="/" class="btn btn-primary">Belanja</a>
                </div>
                @endif

            </div>
          </div>
    </div>
    </div>
    
    </div>
@endsection