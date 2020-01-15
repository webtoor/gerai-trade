<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300&display=swap" rel="stylesheet">
    <style>
    body{
        font-family: 'Josefin Sans', sans-serif;
    }
    @media print {
  #printPageButton {
    display: none;
  }
}
    </style>
    <title>Invoice</title>
</head>
<body>
    <div class="container" style="text-align:center; margin-top:30px;">
        <button id="printPageButton" class="btn btn-primary float-right" onclick="myFunction()"><b>Cetak</b></button>

        <div style="font-size:30px; margin-bottom:30px;">INVOICE</div>
        <div class="float-left" style="margin-bottom:30px; text-align:justify">
            <b style="color:#fa591d;">Status : 
            @if($invoice[0]->order[0]->status_id == '0' )
            Menunggu Pembayaran
            @elseif($invoice[0]->order[0]->status_id != '5' )
            Lunas
            @endif
            </b>
            <div>Nomor Invoice : {{$invoice[0]->order[0]->kode}} </div>
            <div>Tanggal Pembelian : {{ date("j-M-Y H:i", strtotime($invoice[0]->order[0]->created_at))}} WIB</div>
            @if($invoice[0]->order[0]->status_id == '0')
            <div>Bayar sebelum : {{ date("j-M-Y, H:i", strtotime($invoice[0]->order[0]->created_at .  ' +2 day'))}} WIB</div>
            @endif
            <div>Total Pembayaran : Rp {{number_format($invoice[0]->total_pembayaran,0, "", ".")}}</div>
        </div>
        <div class="float-right" style="text-align:justify">
            <div>Nama Penerima : {{$invoice[0]->order[0]->user->alamat->nama_penerima}} </div>
            <div>No Hp Penerima : {{$invoice[0]->order[0]->user->alamat->nohp_penerima}}</div>
            <div>Alamat : {{$invoice[0]->order[0]->user->alamat->alamat}}, {{$invoice[0]->order[0]->user->alamat->province_name}}, {{$invoice[0]->order[0]->user->alamat->city_name}}, {{$invoice[0]->order[0]->user->alamat->kecamatan_name}}, {{$invoice[0]->order[0]->user->alamat->kodepos}}</div>
            <div>Kurir : {{strtoupper($invoice[0]->order[0]->ekspedisi)}} - {{$invoice[0]->order[0]->service}}</div>
        </div>

        

  @foreach($invoice[0]->order as $list)
    <table class="table">
        <thead>
          <tr>
            <th style="width:40%;">Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga Barang</th>
            <th>Catatan</th>

          </tr>
        </thead>
        <tbody>
            @foreach($list->transaction_detail as $produk )

          <tr>
          <td>{{$produk->produk[0]->nama_produk}}</td>
            <td>{{$produk->qty}}</td>
            <td>Rp {{number_format($produk->produk[0]->harga,0, "", ".")}}</td>
            <td>@if($produk->catatan)
                {{$produk->catatan}}
                @else
                -
                @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="float-right" style="margin-bottom:30px;">
        <div>Ongkos Kirim : Rp {{number_format($list->ongkir,0, "", ".")}}</div>
        <div>Total Harga : Rp {{number_format($list->ongkir + $list->total_harga,0, "", ".")}}</div>
      </div>
 

      @endforeach

    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
    <script>
        function myFunction() {
          window.print();
        }
        </script>
</body>

</html>