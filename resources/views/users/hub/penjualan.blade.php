@extends('users.default')

@section('content')
<div class="container-fluid">
    <div class="row">
    @include('users.partials.sidebar')
    <div class="col-sm-10">
        <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top:10px;" >
            <li class="nav-item">
                <a class="nav-link {{ empty($tabName) || $tabName == 'order_baru' ? 'active' : '' }}" id="order-baru" data-toggle="tab" href="#order_baru" role="tab" aria-controls="order_baru" aria-selected="true"><b style="font-size:15px;">Pesanan Baru</b>  
                  @if(count($order_baru) > 0)
                  <span class="badge badge-danger">{{count($order_baru)}}</span>
                  @endif
                </a>
              </li>
        </ul>

          <!-- PESANAN DIPROSES -->

          <div class="tab-pane fade {{ !empty($tabName) && $tabName == 'order_baru' ? 'show active' : '' }}" role="tabpanel" aria-labelledby="proses">
            <div class="row" style="margin-top:40px;">
              <div class="col-sm-12">
                @if(count($order_baru) > 0)

                @foreach($order_baru as $list_baru)
                  <div class="card" style="margin-bottom:20px;">
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item"> 
                      <b> <i class="flaticon-bag fa-lg"></i> Pesanan Baru</b>
                      <a class="float-right" style="color:#fa591d;"> 
                        Total Belanja
                        <?php $subtotal = $list_baru->total_harga + $list_baru->ongkir; ?>
                        Rp {{number_format($subtotal,0, "", ".")}}
                      </a>
                      <p style="font-size:14px; margin-bottom:-10px;">Tanggal Pembelian : {{ date("j-M-Y H:i", strtotime($list_baru->created_at))}} WIB </p>

                    
                      
                  
                    </li>
                   
                      @foreach($list_baru->transaction_detail as $produk_proses)
                      <li class="list-group-item">
                        @foreach($produk_proses->produk as $proses_detail)
                        <a href="{{route('produk-detail', ['slug_produk' => $proses_detail->slug])}}">{{$proses_detail->nama_produk}}</a>, Rp {{number_format($proses_detail->harga,0, "", ".")}}, {{$produk_proses->qty}} Produk
                        @endforeach
                      </li>
                      @endforeach
                      <li class="list-group-item">
                        Ongkos Kirim :  Rp {{number_format($list_baru->ongkir,0, "", ".")}}
                      </li>
                    </ul>

                    <li class="list-group-item">
                       <div><b>Dikirim ke : </b> </div>
                       <div>Penerima : {{$list_baru->user->alamat->nama_penerima}}</div>
                       <div>No Hp Penerima : {{$list_baru->user->alamat->nohp_penerima}}</div>
                       <div>Alamat : {{$list_baru->user->alamat->alamat}}, {{$list_baru->user->alamat->city_name}}, {{$list_baru->user->alamat->kecamatan_name}}, {{$list_baru->user->alamat->province_name}}, {{$list_baru->user->alamat->kodepos}} </div>
                       {{-- {{$list_baru->user->alamat}} --}}

                       <div style="margin-top:5px;"><b>Service : </b> </div>
                       <div>Ekspedisi : {{strtoupper($list_baru->ekspedisi)}}</div>
                       <div>Service: {{$list_baru->service}}</div>

                    </li>
                  </div>
                 
                  @endforeach

                
                  @else
                  <div class="text-center">
                    <button class="btn btn-dark btn-md">Tidak Ada Transaksi</button>
                  </div>
                  @endif
                </div>
            </div>
          </div>
    </div>
    </div>
</div>
@endsection
@section('js')

    
@endsection