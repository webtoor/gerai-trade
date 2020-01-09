@foreach($order_selesai as $list_selesai)
                       
<div class="card" style="margin-bottom:20px;">
  <ul class="list-group list-group-flush">
  <li class="list-group-item"> 
    <b> <i class="flaticon-bag fa-lg"></i> Pesanan Selesai</b>
    <a class="float-right" style="color:#fa591d;"> 
      Total Pembelian
      <?php $subtotal_dasar = 0; ?> 
      @foreach($list_selesai['transaction_detail'] as $total_dasar)
      @foreach($total_dasar['produk'] as $baru_dasar)
      <?php $subtotal_dasar += ($baru_dasar['harga_dasar'] * $total_dasar['qty']) ?>
      @endforeach
      @endforeach

      Rp {{number_format(($subtotal_dasar + $list_selesai['ongkir']) ,0, "", ".")}}

    </a>
    <p style="font-size:14px; margin-bottom:-10px;">Tanggal Pembelian : {{ date("j-M-Y H:i", strtotime($list_selesai['created_at']))}} WIB </p>

  
    

  </li>
 
    @foreach($list_selesai['transaction_detail'] as $produk_selesai)
    <li class="list-group-item">
      @foreach($produk_selesai['produk'] as $selesai_detail)
      <a href="{{route('produk-detail', ['slug_produk' => $selesai_detail['slug']])}}">{{$selesai_detail['nama_produk']}}</a>, Rp {{number_format($selesai_detail['harga_dasar'],0, "", ".")}}, {{$produk_selesai['qty']}} Produk
      @endforeach
      <div>
        @if($produk_selesai->catatan)
        Catatan : {{$produk_selesai->catatan}}
        @else
        Catatan : -
        @endif
      </div>
    </li>
    @endforeach
    <li class="list-group-item">
      Ongkos Kirim :  Rp {{number_format($list_selesai['ongkir'],0, "", ".")}}
    </li>
  </ul>

  <li class="list-group-item">
     <div><b>Dikirim ke : </b> 

      </div>
     <div>Penerima : {{$list_selesai['user']['alamat']['nama_penerima']}}</div>
     <div>No Hp Penerima : {{$list_selesai['user']['alamat']['nohp_penerima']}}</div>
     <div>Alamat : {{$list_selesai['user']['alamat']['alamat']}}, {{$list_selesai['user']['alamat']['city_name']}}, {{$list_selesai['user']['alamat']['kecamatan_name']}}, {{$list_selesai['user']['alamat']['province_name']}}, {{$list_selesai['user']['alamat']['kodepos']}} </div>

     <div style="margin-top:5px;"><b>Service : </b> </div>
     <div>Ekspedisi : {{strtoupper($list_selesai['ekspedisi'])}} - {{$list_selesai['service']}}</div>
     <div style="margin-top:5px;"><b>Detail Pengiriman : </b> </div>
     <div>No Resi : {{$list_selesai['no_resi']}}</div>
    
     
  </li>
</div>
@endforeach
{{ $order_selesai->render() }}
