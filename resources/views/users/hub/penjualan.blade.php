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

              <li class="nav-item">
                <a class="nav-link {{ empty($tabName) || $tabName == 'order_kirim' ? 'active' : '' }}" id="order-kirim" data-toggle="tab" href="#order_kirim" role="tab" aria-controls="order_baru" aria-selected="true"><b style="font-size:15px;">Pesanan Dikirim</b>  
                  @if(count($order_kirim) > 0)
                  <span class="badge badge-danger">{{count($order_kirim)}}</span>
                  @endif
                </a>
              </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div style="margin-top:10px;">
              @include('admin.partials.messages') 

            </div>
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
                        Total Pembelian
                        <?php $subtotal_dasar = 0; ?> 
                        @foreach($list_baru->transaction_detail as $total_dasar)
                        @foreach($total_dasar->produk as $baru_dasar)
                        <?php $subtotal_dasar += ($baru_dasar->harga_dasar * $total_dasar->qty) ?>
                        @endforeach
                        @endforeach
                  
                        Rp {{number_format(($subtotal_dasar + $list_baru->ongkir) ,0, "", ".")}}

                      </a>
                      <p style="font-size:14px; margin-bottom:-10px;">Tanggal Pembelian : {{ date("j-M-Y H:i", strtotime($list_baru->created_at))}} WIB </p>

                    
                      
                  
                    </li>
                   
                      @foreach($list_baru->transaction_detail as $produk_baru)
                      <li class="list-group-item">
                        @foreach($produk_baru->produk as $baru_detail)
                        <a href="{{route('produk-detail', ['slug_produk' => $baru_detail->slug])}}">{{$baru_detail->nama_produk}}</a>, Rp {{number_format($baru_detail->harga_dasar,0, "", ".")}}, {{$produk_baru->qty}} Produk
                        @endforeach
                      </li>
                      @endforeach
                      <li class="list-group-item">
                        Ongkos Kirim :  Rp {{number_format($list_baru->ongkir,0, "", ".")}}
                      </li>
                    </ul>

                    <li class="list-group-item">
                       <div><b>Dikirim ke : </b> 
                       <button id="dikirim"data-transaksi_id="{{$list_baru->id}}" data-toggle="modal" data-target="#dikirims" class="float-right btn btn-outline-dark btn-sm">Konfirmasi Pengiriman</button>

                        </div>
                       <div>Penerima : {{$list_baru->user->alamat->nama_penerima}}</div>
                       <div>No Hp Penerima : {{$list_baru->user->alamat->nohp_penerima}}</div>
                       <div>Alamat : {{$list_baru->user->alamat->alamat}}, {{$list_baru->user->alamat->city_name}}, {{$list_baru->user->alamat->kecamatan_name}}, {{$list_baru->user->alamat->province_name}}, {{$list_baru->user->alamat->kodepos}} </div>
                       {{-- {{$list_baru->user->alamat}} --}}

                       <div style="margin-top:5px;"><b>Service : </b> </div>
                       <div>Ekspedisi : {{strtoupper($list_baru->ekspedisi)}} - {{$list_baru->service}}</div>

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
</div>

<!-- BATALKAN PESANAN -->
<div class="modal fade" id="dikirims" tabindex="-1" role="dialog" aria-labelledby="batalkanLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      {!! Form::open([ 'route' => ['home.konfirmasi-pengiriman'], 'method' => "POST"])!!}
  
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pengiriman</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
            <label>Masukan No Resi <sup style="color:red"> *Wajib</sup></label> 
            <input type="text" class="form-control"  name="no_resi"  placeholder="Masukan No Resi" required>
            <input type="hidden" id="transaksi_id" name="transaksi_id" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-primary btn-sm" >Ya</button>
        </div>
      </div>
      {!! Form::close() !!}
  
    </div>
  </div>
  
@endsection
@section('js')
<script>
$(document).ready(function() {
    
$("button#dikirim").click(function () {
        var transaksi_id =  $(this).data('transaksi_id');
        $('#transaksi_id').val(transaksi_id);
        console.log(transaksi_id)
    });
});
</script>

    
@endsection