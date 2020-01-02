@extends('admin.default')

@section('content')
<div class="text-center">
    <b>Transaksi</b>
    <h4 class="c-blue-900"><b>Detail Transaksi</b></h4>
</div>
<div class="bgc-white p-20 bd">
    <ul class="list-group list-group-flush">
    <li class="list-group-item">STATUS : 
        @if($detail->status_id == '0')
        Menunggu Pembayaran
        @elseif($detail->status_id == '1')
        Menunggu Konfirmasi 
        @elseif($detail->status_id == '2')
        Pesanan Diproses
        @elseif($detail->status_id == '3')
        Pesanan Dikirim
        @elseif($detail->status_id == '4')
        Pesanan Selesai
        @elseif($detail->status_id == '5')
        Pesanan Dibatalkan
        @endif
        <a class="float-right" style="color:#fa591d;"> 
            Total Belanja <?php $subtotal = $detail->total_harga + $detail->ongkir; ?>
            Rp {{number_format($subtotal,0, "", ".")}}
        </a>
        <p style="font-size:14px; margin-bottom:-10px;">Tanggal Pembelian : {{ date("j-M-Y H:i", strtotime($detail['created_at']))}} WIB </p>

    </li>
    @foreach($detail->transaction_detail as $list_detail)
    @foreach($list_detail->produk as $list_produk)
    <li class="list-group-item">{{$list_produk->nama_produk}}, {{$list_detail->qty}} Produk, Rp {{number_format($list_produk->harga,0, "", ".")}} </li>
    <li class="list-group-item">Ongkos Kirim Rp {{number_format($detail->ongkir,0, "", ".")}}</li>
    @endforeach
    @endforeach

    <li class="list-group-item">
        Pembeli : {{$detail->user->nama_depan}} {{$detail->user->nama_belakang}} <br>
        Hub : {{$detail->hub->nama_hub}} <br>

        Kurir : {{strtoupper($detail->ekspedisi)}} <br>
        Service : {{$detail->service}} <br>
        No Resi : {{$detail->no_resi}} <br>
        @if($resi)
        Dikirim dari : {{$resi['rajaongkir']['result']['summary']['origin']}} <br>
        Tujuan : {{$resi['rajaongkir']['result']['summary']['destination']}} <br>
        @endif
    </li>
    @if($resi)
    {{-- {{json_encode($resi)}} --}}
    <table class="table">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col"></th>
              <th scope="col">History</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1;?>
            @foreach($resi['rajaongkir']['result']['manifest'] as $manifest)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$manifest['manifest_date']}}, {{$manifest['manifest_time']}}</td>
                <td>{{$manifest['manifest_description']}}, {{$manifest['city_name']}}</td>
            </tr>
            @endforeach
          </tbody>
    </table>
    @endif
    </ul>
</div>

@endsection