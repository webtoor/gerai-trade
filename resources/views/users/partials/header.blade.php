<nav class="navbar navbar-expand-md sticky-top navbar-dark indigo">
    <a class="navbar-brand" href="#">LOGO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
   
      
    <div style="width:500px;">
        <form>
            <div class="input-group pl-2">
                <input class="form-control my-0 py-1 white-border" type="text" placeholder="Cari produk"
                    aria-label="Search">
                <a href="#" class="input-group-append">
                    <span class="input-group-text white lighten-3" id="basic-text1">

                        <i class="fas fa-search text-grey" aria-hidden="true"></i> </span>
                </a>
            </div>
        </form>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown" style="margin-right:20px;">
            <a href="#" id="menu" data-toggle="dropdown" class="nav-link dropdown-toggle white-text " 
            >Kategori</a>
            <ul class="dropdown-menu mt-2 rounded-0  darken-4 border-0 z-depth-1">
              <li class="dropdown-item dropdown-submenu p-0">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle dropdown-item text-black w-100">Click Me Too! </a>
                <ul class="dropdown-menu ml-0 rounded-0  darken-4 border-0 z-depth-1">
                  
                  <li class="dropdown-item p-0">
                    <a href="#" class="dropdown-item text-black w-100">Hey</a>
                  </li>
                  <li class="dropdown-item p-0">
                    <a href="#" class="dropdown-item text-black w-100">Hi</a>
                  </li>
                  <li class="dropdown-item dropdown-submenu p-0">
                      <a href="#" data-toggle="dropdown" class="dropdown-toggle dropdown-item text-black w-100">Hello </a>
                      <ul class="dropdown-menu ml-0 rounded-0  darken-4 border-0 z-depth-1 r-100 ">
                        <li class="dropdown-item p-0">
                          <a href="#" class="dropdown-item text-black w-100">Some</a>
                        </li>
                        <li class="dropdown-item p-0">
                          <a href="#" class="dropdown-item text-black w-100">Text</a>
                        </li>
                        </ul>
                </ul>
              </li>
             {{--  <li class="dropdown-item dropdown-submenu p-0">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle text-black w-100">Click me </a>
                <ul class="dropdown-menu  ml-1 rounded-0   darken-4 border-0 z-depth-1 r-100 ">
                  <li class="dropdown-item p-0">
                    <a href="#" class="text-black w-100">How</a>
                  </li>
                  <li class="dropdown-item p-0">
                    <a href="#" class="text-black w-100">are</a>
                  </li>
                  <li class="dropdown-item p-0">
                      <a href="#" class="text-black w-100">you </a>
                    </li>
                </ul>
              </li> --}}
            </ul>
          </li>
          
       </li>
            <li class="nav-item dropdown" style="margin-right:20px;">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">Tentang Kita</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Siapa Kita</a>
                    <a class="dropdown-item" href="#">Cerita Kita</a>
                    <a class="dropdown-item" href="#">Kontak Kita</a>
                </div>
            </li>
            <li class="nav-item" style="margin-right:20px;">
                <a class="nav-link" href="#"><b>Belanja Bersama Kita</b></a>
            </li>
            
        </ul>

        @guest
        <form class="form-inline">
            <a href="/login" class="btn btn-white btn-sm" role="button" style="color:black">Masuk</a>
            <a href="/register" class="btn btn-outline-white btn-sm my-2 my-sm-0 ml-3" role="button"
                style="color:white">Daftar</a>
        </form>
        @else
        <div class="dropdown">

            <!--Trigger-->
            <a class="btn btn-outline-white btn-sm dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown"
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

 