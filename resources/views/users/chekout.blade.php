


<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600" rel="stylesheet">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
  	<link rel="stylesheet" href="/css/flaticon.css"/>
    <link rel="stylesheet" type="text/css" href="../css/banner.css">

    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <style>
    .icon-rotates {
  -moz-transition: all 1s linear;
  -webkit-transition: all 1s linear;
  transition: all 1s linear;
}

.icon-rotates.rotate {
  -moz-transition: rotate(180deg);
  -webkit-transition: rotate(180deg);
  transition: rotate(180deg);
}


.dropdown.open .icon-rotates {
  -webkit-transform: rotate(180deg);
  transform: rotate(180deg);
}
.ftco-footer {
      font-size: 14px;
      padding: 7em 0;
      color: #000000; }
      .ftco-footer .ftco-footer-logo {
        text-transform: uppercase;
        letter-spacing: .1em; }
      .ftco-footer .ftco-footer-widget h2 {
        font-weight: normal;
        margin-bottom: 20px;
        font-size: 16px;
        font-weight: 500; }
      .ftco-footer .ftco-footer-widget ul li {
        font-size: 14px;
        margin-bottom: 0px; }
        .ftco-footer .ftco-footer-widget ul li a {
          color: #000000; }
      .ftco-footer .ftco-footer-widget .btn-primary {
        border: 2px solid #fff !important; }
        .ftco-footer .ftco-footer-widget .btn-primary:hover {
          border: 2px solid #fff !important; }
    
    .ftco-footer-social li {
      list-style: none;
      margin: 0 10px 0 0;
      display: inline-block; }
      .ftco-footer-social li a {
        height: 50px;
        width: 50px;
        display: block;
        float: left;
        background: rgba(0, 0, 0, 0.02);
        border-radius: 50%;
        position: relative; }
        .ftco-footer-social li a span {
          position: absolute;
          font-size: 26px;
          top: 50%;
          left: 50%;
          -webkit-transform: translate(-50%, -50%);
          -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
          color: #000000; }
        .ftco-footer-social li a:hover {
          color: #000000; }

          .shopping-card {
	display: inline-block;
	position: relative;
}

.shopping-card span {
	position: absolute;
	top: -4px;
	left: 100%;
	height: 16px;
	min-width: 16px;
	color: #fff;
	font-size: 13px;
	background: #f51167;
	text-align: center;
	border-radius: 30px;
	padding: 0 2px;
	margin-left: -7px;
}
      </style>
</head>
<body>
 <nav class="navbar navbar-expand-md sticky-top navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/img/logo.png" alt="" style="margin-top:-10px;" height="45px;">
                </a>
                

            </div>
        </nav>

    <section class="banner-area organic-breadcrumb" style="margin-top:-20px;">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                <div class="col-first">
                    <h1>Checkout</h1>
                </div>
            </div>
        </div>
    </section>

    @if(count(Cart::instance('default')->content()))
        <div class="container" style="margin-top:-30px;">
          <div class="row bar">
            
            <div id="basket" class="col-lg-8">
              <div class="box mt-0 pb-0 no-horizontal-padding">
              <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th><b> Alamat Pengiriman </b></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                          @if($alamat)
                          {{$alamat->nama_penerima}} <br>
                          {{$alamat->nohp_penerima}} <br>
                          {{$alamat->alamat}}, {{$alamat->provinsi->name}}, {{$alamat->kota_kabupatens->name}}, {{$alamat->kecamatans->name}}, {{$alamat->kelurahan_desa->name}}

                          @else
                          Anda belum mempunyai alamat pengiriman, silakan isi dulu <a href="{{route('index-pengaturan')}}" style="color:blue">disini</a>
                          @endif
                          </td>
                    
                        </tr>
                      </tbody>
                      <tfoot>
                       
                      </tfoot>
                    </table>
                  </div>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Produk</th>
                          <th>Jumlah</th>
                          <th>Harga</th>
                          <th>Berat</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach(Cart::content() as $row) :?>
                        <tr>
                          <td><a href="{{route('produk-detail', ['slug_produk' => $row->options->slug])}}" style="color:#3f51b5; font-weight:bold"><?php echo $row->name; ?></a></td>
                          <td>
                            {{$row->qty}}
                          </td>
                          <td>Rp {{number_format($row->price,0, ".", ".")}}</td>
                        <td>{{$row->options->weight}} gram</td>
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                      <tfoot>
                       
                      </tfoot>
                    </table>
                  </div>
              
              </div>
              <p style="margin-left:10px; color:black"><b>Ongkos Kirim</b></p>
              <div class="border-top my-3" >
                <div style="margin-top:20px; margin-bottom:100px;">
                  <div class="form-row" >
                      <div class="form-group col-md-6">
                          <label>Pilih Ekspedisi</label>
                          <select class="form-control" name="eks" id="eks">
                            <option value="jne">JNE</option>
                            <option value="pos">POS</option>
                            <option value="tiki">TIKI</option>
                          </select>
                        </div>
                <div class="form-group col-md-6" >
                  <label>Pilih Kota</label>
                  <select class="form-control" onchange="check()" id="city" name="city" required="true">
                      @php
                      $city = city();
                      $city = json_decode($city,true);
                  @endphp
                  @foreach($city['rajaongkir']['results'] as $citys)
                    <option value="{{ $citys['city_id'] }}">{{ $citys['city_name'] }} </option>
                    @endforeach           
                       </select>
                </div>
               
               
              </div>
              <div class="form-row">
                  <div class="form-group col-md-12">
                      <label>Provinsi</label>
                       <input type="text" class="form-control" id="provinsi" name="provinsi" readonly="">
                       <input type="hidden" class="form-control" id="provinsi_id" name="provinsi_id">

                    </div>
                    <input  type="hidden" class="form-control" name="portal_code" id="portal_code" readonly="">

                  {{-- <div class="form-group col-md-6">
                      <label for="zip">Kode POS</label>
                      <input  type="text" class="form-control" name="portal_code" id="portal_code" readonly="">
                    </div> --}}
                    
                    {{-- <div class="form-group col-md-4">
                        <label for="zip">Ongkos Kirim / 1Kg</label>
                        <input  type="text" class="form-control" name="ongkir" id="ongkir" readonly="">
                      </div> --}}
              </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="zip">Cek Ongkir</label>

                    <button id="submitongkir" class="btn btn-secondary btn-block btn-md">CEK ONGKIR</button>
                  </div>
                    <div class="form-group col-md-6">
                        <label for="zip">Total Ongkos Kirim (Regular)</label>
                        <input  type="text" class="form-control" name="ongkir" id="ongkir" readonly="">
                      </div>
              </div>
            
              </div>
            </div>
            </div>
           
            <div class="col-lg-4" style="margin-top:10px;">
                    <div id="order-summary" class="card box mt-0 mb-4 p-0">
                            <div class="card-body">
                              <h6 class="card-title"><b>Ringkasan Belanja</b></h6>
                              <div class="table-responsive">
                                    <table class="table">
                                      <tbody>
                                        <tr>
                                          <td>Total Harga</td>
                                          <th>Rp. <?php echo Cart::instance('default')->total(); ?></th>
                                      </tr>
                                      <tr>
                                          <td>Total Ongkos Kirim</td>
                                          <th id="totalongkir">-</th>
                                      </tr>
                                    <tr>
                                        <td>Total Tagihan</td>
                                        <th id="totaltagihan">-</th>
                                    </tr>
                                      </tbody>
                                    </table>
                  
                                  </div>
                              <a href="#" class="btn btn-outline-dark btn-block"><b>BAYAR SEKARANG</b></a>

                            </div>
                          </div>
            
            </div>
            
          </div>
        </div>
        @else
        <div class="text-center">
            <p>Wah, keranjang Anda kosong nih </p>
            <a href="/" class="btn btn-primary">Belanja</a>
        </div>
        @endif


 
    <script src="{{ mix('/js/app.js') }}"></script><script type="text/javascript">
      function check (){
        var id = $("#city").val();
        $.ajax({
          type: "GET",
          url : "{{ url('citybyid/') }}/"+id,
          dataType : "JSON",
          success:function(data){
           // console.log(data)
            $("#provinsi").val(data.rajaongkir.results.province)
            $("#portal_code").val(data.rajaongkir.results.postal_code)
            $("#provinsi_id").val(data.rajaongkir.results.province_id)

          }
        });
       
      }
      $("button#submitongkir").click(function () {
        var params = {
        'eks': $('#eks').val(),

        'provinsi_id': $('#provinsi_id').val(),
        'city_id': $('#city').val(),
        }
        console.log(params)
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
          contentType: "application/json",
          dataType: "json",
          type: 'POST',
          url : "{{ url('cek-ongkir') }}",
          data: JSON.stringify(params),
          success:function(datas){
            //console.log(datas.rajaongkir.results[0].costs[1].cost[0].value)
            $("#ongkir").val(datas.rajaongkir.results[0].costs[1].cost[0].value);
            $("#totalongkir").html('Rp. ' + datas.rajaongkir.results[0].costs[1].cost[0].value.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
            var totalharga = "<?php echo str_replace(',','',Cart::instance('default')->total()); ?>";
            console.log(totalharga)
            console.log(parseInt(totalharga) + parseInt(datas.rajaongkir.results[0].costs[1].cost[0].value))
            var totaltagihan = parseInt(totalharga) + parseInt(datas.rajaongkir.results[0].costs[1].cost[0].value)
            $("#totaltagihan").html('Rp. ' + totaltagihan.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));


          }
        });
      });
    </script>
</body>
</html>