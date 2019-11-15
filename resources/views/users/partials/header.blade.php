
<nav class="navbar navbar-expand-sm sticky-top navbar-light" style="background-color: #FFFFFF">
    <a class="navbar-brand" href="/">            
      <img src="/img/logo.png" alt="" style="margin-top:-5px;" height="20px;">
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
         

       <li class="nav-item" style="margin-right:17px;">
          <a class="nav-link" href="#"><b>Cerita Kita</b></a>
      </li>
      @guest
          <li class="nav-item dropdown" style="margin-right:20px;">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">Tentang Kita</a>
              <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{route('siapa-kita')}}">Siapa Kita</a>
                  <a class="dropdown-item" href="{{route('cerita-kita')}}">Cerita Kita</a>
                  <a class="dropdown-item" href="{{route('kontak-kita')}}">Kontak Kita</a>
              </div>
            </li>

              @else
              <li class="nav-item" style="margin-right:20px;">
                <a class="nav-link" href="{{ url('/keranjang-belanja') }}">
                    <div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag fa-lg"></i>
                  <span>
                      {{ Cart::instance('default')->count() }}
                  </span>
                </div>
                <b style="margin-left:5px;">
                    Keranjang Belanja
                  </b>
							</div> 
                </a>
            </li>
							

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
             <div class="dropdown">
     
                 <!--Trigger-->
                 <a class="btn btn-outline-indigo btn-sm dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false"><b> {{Auth::user()->nama_depan}} {{Auth::user()->nama_belakang}}</b></a>
     
                 <!--Menu-->
                 <div class="dropdown-menu dropdown-menu-right" style=" width:250px;">
                     <a class="dropdown-item" href="#">Pembelian</a>
                     <a class="dropdown-item" href="#">Wishlist</a>
                     <a class="dropdown-item" href="#">Pengaturan</a>
                     <a class="dropdown-item" href="/logout">Logout</a>
                 </div>
             </div>
             @endguest
        </ul>

       {{--  @guest
       
        <form class="form-inline">
            <a href="/login" class="btn btn-white btn-sm" role="button" style="color:black">Masuk</a>
            <a href="/register" class="btn btn-outline-white btn-sm my-2 my-sm-0 ml-3" role="button"
                style="color:white">Daftar</a>
        </form>
        @else
        <div class="dropdown">

            <a class="btn btn-outline-white btn-sm dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><b> {{Auth::user()->nama_depan}} {{Auth::user()->nama_belakang}}</b></a>

            <div class="dropdown-menu dropdown-menu-right" style=" width:250px;">
                <a class="dropdown-item" href="#">Pembelian</a>
                <a class="dropdown-item" href="#">Wishlist</a>
                <a class="dropdown-item" href="#">Pengaturan</a>
                <a class="dropdown-item" href="/logout">Logout</a>
            </div>
        </div>
        @endguest --}}

        <!--Dropdown primary-->


        <!--/Dropdown primary-->
        {{-- <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item avatar dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle z-depth-0" alt="avatar image" style="height: 35px; width:35px;">
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul> --}}
     
    </div>
    
</nav>
{{-- <div class="container mt-5">
       <ul style="list-style-type:none">
       <li>
         <a href="#" type="dropdown" id="dropdown" data-toggle="dropdown" class="dropdown multi-level-dropdown"
         aria-haspopup="true" aria-expanded="false">Kategori</a>
         <ul  style = "list-style-type:none"class="dropdown-menu mt-2 rounded-0 white border-0 z-depth-1">
           <li class="dropdown-item dropdown-submenu p-0">
             <a href="#" data-toggle="dropdown" class="dropdown-toggle dropdown-item w-100">Click Me! </a>
             <ul class="dropdown-menu  rounded-0 white border-0 z-depth-1">
               <li class="dropdown-item p-0">
                 <a href="#" class="dropdown-item w-100">Hey</a>
               </li>
               <li class="dropdown-item p-0">
                 <a href="#" class="dropdown-item w-100">Hi</a>
               </li>
               <li class="dropdown-item p-0">
                 <a href="#" class="dropdown-item w-100">Hello</a>
               </li>
             </ul>
           </li>
           <li class="dropdown-item dropdown-submenu p-0">
             <a href="#" data-toggle="dropdown" class="dropdown-toggle dropdown-item w-100">Click Me Too! </a>
             <ul  class="dropdown-menu mr-2 rounded-0  white border-0 z-depth-1 r-100">
               <li class="dropdown-item p-0">
                 <a href="#" class="dropdown-item w-100">How</a>
               </li>
               <li class="dropdown-item p-0">
                 <a href="#" class="dropdown-item w-100">are</a>
               </li>
               <li class="dropdown-item dropdown-submenu p-0">
                 <a href="#" data-toggle="dropdown" class="dropdown-toggle dropdown-item w-100">Click Me Too! </a>
                 <ul style = "list-style-type:none"class="dropdown-menu mr-2 rounded-0 white border-0 z-depth-1 r-100 ">
                   <li class="dropdown-item p-0">
                     <a href="#" class="dropdown-item w-100">How</a>
                   </li>
                   <li class="dropdown-item p-0">
                     <a href="#" class="dropdown-item w-100">are</a>
                   </li>
             </ul>
             </li>
            </ul>
            </li>
         </ul>
         </li>
         
       </ul>
</div>
 --}}

 