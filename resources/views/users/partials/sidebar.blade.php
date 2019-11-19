<div class="col-sm-2 my-2">
    <div class="card">
        <div class="list-group">

          <div style="text-align:center">
              <p class="list-group-item border-bottom-0">
                  <b>  {{Auth::user()->nama_depan}}
                          {{Auth::user()->nama_belakang}}</b>
                </p>
          </div>
          
              <p class="list-group-item border-top-0 text-center" style="margin-top:-10px;">
                <img src="images/profiluser.png" style="width: 152px;">
              </p>

           
            <a href="{{route('home.showDaftarMitra')}}" class="list-group-item border-top-0">
              @if((Auth::user()->role->role_id == '1') && (Auth::user()->status_mitra != '1'))
            <button class="btn btn-primary btn-sm btn-block">Daftar Mitra</button>
              @else
              @endif
            </a>


            <p href="#" class="list-group-item border-bottom-0">
                    <b style="font-size:14px;">PEMBELIAN</b>    
                </p>
                    <a href="#" class="list-group-item border-top-0" style="font-size:14px;">Daftar Transaksi</a>
            <p href="#" class="list-group-item">
                    <b style="font-size:14px;">PROFIL SAYA</b>    
            </p>
            <div style="font-size: 14px;">
                <a href="{{route('wishlist')}}" class="list-group-item border-top-0" style="margin-bottom:-10px;">Wishlist</a>
                <a href="#" class="list-group-item border-top-0" style="margin-top:-14px;">Pengaturan</a>
            </div>
        </div>
    </div>
  {{--   <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a data-toggle="collapse" href="#Kopi" aria-expanded="false" aria-controls="Kopi">
                Kopi<span class="mr-3"></span></a>
                <ul class="collapse" id="Kopi" data-toggle="collapse" aria-expanded="false" aria-controls="Kopi">
                    <li class="list-group-item border-0 px-0"><a href="#">Kopi Bubuk</a></li>
                    <li class="list-group-item border-0 px-0"><a href="#">Kopi Kemasan</a></li>
                    <li class="list-group-item border-0 px-0"><a href="#">Biji Kopi</a></li>
                    
                </ul>
            </li>
            <li class="list-group-item">
                    <a data-toggle="collapse" href="#Teh" aria-expanded="false" aria-controls="Teh">
                    Teh<span class="mr-3"></span></a>
                    <ul class="collapse" id="Teh" data-toggle="collapse" aria-expanded="false" aria-controls="Kopi">
                        <li class="list-group-item border-0 px-0"><a href="#">Kopi Bubuk</a></li>
                        <li class="list-group-item border-0 px-0"><a href="#">Kopi Kemasan</a></li>
                        <li class="list-group-item border-0 px-0"><a href="#">Biji Kopi</a></li>
                        
                    </ul>
                </li>
                <li class="list-group-item px-0">
                    
                        <a class="collapsed" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="true" aria-controls="collapseExample3">
                      Link with href 
                      </a>
                        <div class="collapse" id="collapseExample3">
                          <div class="card card-body mt-2">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                          </div>
                        </div>
                      </li>
                      
        </ul> --}}
      {{--   <li class="list-group-item">
            <a class="collapsible-header waves-effect arrow-r">
            Instruction<i class="fas fa-angle-down icon-rotates"></i></a>
          <div class="collapsible-body">
            <ul>
              <li><a href="#" class="waves-effect">For bloggers</a>
              </li>
              <li><a href="#" class="waves-effect">For authors</a>
              </li>
            </ul>
          </div>
        </li> --}}

        
  
{{--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<div class="dropdown">
		<a id="dropdown1" class="hlo-btn-round-dropdown dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="button" tabindex="1">Dropdown <i class="fa fa-chevron-down fa-color icon-rotates" aria-hidden="true"></i></a>
		<ul class="dropdown-menu" aria-labelledby="dropdown1">
			<li><a href="#">Action</a></li>
			<li><a href="#">Another action</a></li>
			<li><a href="#">Something else here</a></li>
			<li role="separator" class="divider"></li>
			<li><a href="#">Separated link</a></li>
		</ul>

  </div> --}}
  
  {{-- <ul class="sidebar-menu scrollable">
                 
    <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
              <i class="c-red-500 ti-files"></i>
            </span>
          <span class="title">Pages</span>
          <span class="arrow">
              <i class="ti-angle-right"></i>
            </span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class='dropdown-item' href="blank.html">Blank</a>
          </li>                 
       
        </ul>
      </li>
   
    </ul> --}}
</div>
