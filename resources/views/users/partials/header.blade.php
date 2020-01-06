<?php 
use App\Models\Transaction;

Transaction::where(['status_id' => '0'])->where('created_at', '<', \Carbon\Carbon::now()->subDays(2))->update([
  'status_id' => '5'
]);
?>


<nav class="navbar navbar-expand-sm sticky-top navbar-light" style="background-color: #FFFFFF">
    <a class="navbar-brand" href="/">            
      <img src="/img/logo.png" alt="" style="margin-top:-10px;" height="45px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
   
      
   
    <div class="collapse navbar-collapse" id="navbarNav">
      
        <ul class="navbar-nav mr-auto">
            
          <li class="nav-item dropdown " >
            <a href="#" id="menu" data-toggle="dropdown" class="nav-link dropdown-toggle indigo-text  " 
            >Kategori</a>
            <ul class="dropdown-menu mt-2 rounded-0  darken-4 border-0 z-depth-1">
              @foreach ($kategori as $kategories)
              @if(count($kategories->sub_kategori) == 0 )
            <a class="dropdown-item" href="{{ url('k/'.$kategories->slug) }}">{{$kategories->kategori_name}}</a>
              @else
              <li class="dropdown-item dropdown-submenu p-0">

                <a href="javascript:void(0)" data-toggle="dropdown" class="dropdown-toggle dropdown-item text-black w-100">{{$kategories->kategori_name}} </a>
                    
                <ul class="dropdown-menu ml-0 rounded-0  darken-4 border-0 z-depth-1">
                    @foreach ($kategories->sub_kategori as $sub_kategories)

                  <li class="dropdown-item p-0">
                    <a href="{{ url('k/'.$sub_kategories->slug) }}" class="dropdown-item text-black w-100">{{$sub_kategories->subkategori_name}}</a>
                  </li>
                  @endforeach

                </ul>

              </li>
              @endif
              @endforeach

            </ul>

          </li>

       
       </li>
      
        </ul>
        <form class="my-auto d-inline w-50" action="{{route('p.search-produk')}}">
            <div class="input-group" >
                <input class="form-control my-0 py-1" name="filter" type="text" placeholder="Cari produk" aria-label="Search" required>
                <a class="input-group-append white">
                    <button type="submit" class="input-group-text white no-border" id="basic-text1">
                        <i class="fas fa-search" aria-hidden="true"></i> 
                      </button>
                    </a>
            </div>
        </form>
        
        <ul class="navbar-nav ml-auto">
         

       <li class="nav-item" style="margin-right:20px;">
          <a class="nav-link" href="{{route('cerita-kita')}}"><b>Cerita Kita</b></a>
      </li>
      @guest
          <li class="nav-item dropdown" style="margin-right:20px;">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">Tentang Kita</a>
              <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{route('siapa-kita')}}">Siapa Kita</a>
                  <a class="dropdown-item" href="{{route('kontak-kita')}}">Kontak Kita</a>
              </div>
            </li>

              @else
              @if(Auth::user()->role->role_id == '1')

              <li class="nav-item" style="margin-right:20px;">
                <a class="nav-link" href="{{ url('/keranjang-belanja') }}">
                    <div class="up-item">
								<div class="shopping-card">
                  <i class="flaticon-bag fa-lg"></i>
                  @if(Cart::instance('default')->count() > 0)
                  <span>
                      {{ Cart::instance('default')->count() }}
                  </span>
                  @endif
                </div>
                <b style="margin-left:5px;">
                    Keranjang Belanja
                  </b>
							</div> 
                </a>
            </li>
            @endif
							

              @endguest
            
            
            @guest
       
            <li class="nav-item">
              <a href="/login" class="btn btn-white btn-sm" role="button" style="color:black">Masuk</a>
    
            </li>
            <li class="nav-item">
              <a href="/register" class="btn btn-outline-indigo btn-sm" role="button"
              style="color:white">Daftar</a>
            </li>
             @else

             @if(Auth::user()->role->role_id == '2')
             <div class="dropdown">
     
                 <!--Trigger-->
                 <a class="btn btn-outline-indigo btn-sm dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false">
                     <b> 
                       @if(Auth::user()->role->role_id == '2')
                       {{Auth::user()->nama_hub}} 
                       @else
                       {{Auth::user()->nama_depan}} 
                       @endif
                    </b>
                  </a>
     
                 <!--Menu-->
                 <div class="dropdown-menu dropdown-menu-right" style=" width:250px;">
                  @if(Auth::user()->role->role_id == 1)
                     <a class="dropdown-item" href="{{route('home.getWaitPayment')}}">Pembelian</a>
                     <a class="dropdown-item" href="{{route('wishlist')}}">Wishlist</a>
                     <a class="dropdown-item" href="{{route('index-pengaturan')}}">Pengaturan</a>
                     <a class="dropdown-item" href="/logout">Logout</a>
                  @elseif(Auth::user()->role->role_id == 2)
                  <a class="dropdown-item" href="#">Penjualan</a>
                  <a class="dropdown-item" href="{{route('index-pengaturan')}}">Pengaturan</a>
                  <a class="dropdown-item" href="/logout">Logout</a>
                  @endif

                 </div>
             </div>
             @elseif(Auth::user()->role->role_id == '1')
             <div class="dropdown">
                <!--Trigger-->
                <a class="btn btn-outline-indigo btn-sm dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <b> 
                      @if(Auth::user()->role->role_id == '1')
                      {{Auth::user()->nama_depan}} 
                      @endif
                   </b>
                 </a>
    
                <!--Menu-->
                <div class="dropdown-menu dropdown-menu-right" style=" width:250px;">
                    <a class="dropdown-item" href="{{route('home.getWaitPayment')}}">Pembelian</a>
                    <a class="dropdown-item" href="{{route('wishlist')}}">Wishlist</a>
                    <a class="dropdown-item" href="{{route('index-pengaturan')}}">Pengaturan</a>
                    <a class="dropdown-item" href="/logout">Logout</a>
                </div>
            </div>

             @endif
             @endguest
        </ul>

    </div>
    
</nav>
