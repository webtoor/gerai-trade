<?php 
use App\Models\Pesan;
use App\Models\Transaction;

 ?>
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
                <img src="/images/profiluser.png" style="width: 110px; height:100px;">
              </p>

           
            {{-- <a href="{{route('home.showDaftarMitra')}}" class="list-group-item border-top-0">
              @if((Auth::user()->role->role_id == '1') && (Auth::user()->status_mitra != '1'))
            <button class="btn btn-primary btn-sm btn-block">Daftar Mitra</button>
              @else
              @endif
            </a> --}}

            @if(Auth::user()->role->role_id == '2')
            <p href="#" class="list-group-item border-bottom-0">
                <b style="font-size:14px;">PRODUK</b>    
            </p>
            <a href="{{route('home.produk-saya')}}" class="list-group-item border-top-0" style="font-size:14px;">Produk Saya</a>
           
            <p href="#" class="list-group-item border-bottom-0">
                <b style="font-size:14px;">PENJUALAN</b>    
            </p>
            <a href="{{route('home.get-penjualan')}}" class="list-group-item border-top-0" style="font-size:14px;">Penjualan Saya
            <?php $hub = Transaction::where(['hub_id' => Auth::user()->id])->whereIn('status_id', ['2'])->orderBy('created_at', 'desc')->get(); ?>

            @if(count($hub) > 0)
            <span class="badge badge-danger">{{count($hub)}}</span>

            @endif
            </a>

            <p href="#" class="list-group-item border-bottom-0">
                <b style="font-size:14px;">CERITA</b>    
            </p>
            <a href="{{route('home.cerita-saya')}}" class="list-group-item border-top-0" style="font-size:14px;">Cerita Saya</a>
            @endif

            @if(Auth::user()->role->role_id == '1')
            <p href="#" class="list-group-item border-bottom-0">
              <b style="font-size:14px;">KOTAK MASUK</b>    
          </p>

          
              <a href="{{route('home.getChat')}}" class="list-group-item border-top-0" style="font-size:14px;">Pesan
                <?php $pesan_count = Pesan::where(['from' => Auth::user()->id,'client_read' => '0'])->first(); ?>
                <?php if($pesan_count){ ?>
                  <span class="badge badge-danger">pesan baru</span>
              <?php }
                 
                  ?>
              </a>


            <p href="#" class="list-group-item border-bottom-0">
                    <b style="font-size:14px;">PEMBELIAN</b>    
                </p>
                    <a href="{{route('home.getWaitPayment')}}" class="list-group-item border-top-0" style="font-size:14px;">
                        Daftar Transaksi
                      <?php 
                        $order_count = Transaction::where(['user_id' => Auth::user()->id])->whereIn('status_id', ['0','1', '2', '3'])->orderBy('created_at', 'desc')->get();

                      $new_order_count = collect($order_count)->unique('kode');
                      $order_array_count = [];
                      foreach($new_order_count as $data){
                          $totals = 0;
                          $total = Transaction::where(['user_id' => Auth::user()->id,'kode' => $data->kode])->whereIn('status_id', ['0','1', '2', '3'])->get();
                          foreach($total as $data_check){
                              $totals +=  $data_check->ongkir + $data_check->total_harga; 
                          }
                          array_push($order_array_count, (object)[
                              'order' => $total,
                              'total_pembayaran' => $totals
                          ]);
                      }
                      ?>
                        @if(count($order_array_count) > 0)
                        <span class="badge badge-danger">{{count($order_array_count)}}</span>
                        @endif
                    </a>

                    
            @endif

            <p href="#" class="list-group-item">
                    <b style="font-size:14px;">PROFIL SAYA</b>    
            </p>
            <div style="font-size: 14px;">
              @if(Auth::user()->role->role_id == '1')
                <a href="{{route('wishlist')}}" class="list-group-item border-top-0" style="margin-bottom:-10px;">Wishlist</a>
                <a href="{{route('index-pengaturan')}}" class="list-group-item border-top-0" style="margin-top:-14px;">Pengaturan</a>
                @elseif(Auth::user()->role->role_id == '2')
                <a href="{{route('home.index-pengaturan')}}" class="list-group-item border-top-0" style="margin-top:-14px;">Pengaturan</a>

                @endif
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
