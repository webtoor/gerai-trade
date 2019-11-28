


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
                          @if(count($alamat) > 0)
                          {{$alamat[0]->nama_penerima}} <br>
                          {{$alamat[0]->nohp_penerima}} <br>
                          {{$alamat[0]->provinsi->alamat}}, {{$alamat[0]->provinsi->name}}, {{$alamat[0]->kota_kabupatens->name}}, {{$alamat[0]->kecamatans->name}}, {{$alamat[0]->kelurahan_desa->name}}

                          @else
                          Anda belum mempunyai alamat pengiriman, silakan isi dulu <a href="" style="color:blue">disini</a>
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
                          <th></th>
                          <th></th>
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
                          {{-- <td>
                            <button style="border: none;background: none;" type="submit"><i class="fas fa-sync-alt green-text"></i>
                            </button>
                          </td>
                          <td>
                             <a href="{{ url('/cart-delete/'.$row->rowId) }}"><i class="fa fa-trash red-text" aria-hidden="true"></i>
                            </a>
                          </td> --}}
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                      <tfoot>
                       
                      </tfoot>
                    </table>
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
                                          <th><?php echo Cart::instance('default')->total(); ?></th>
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


 
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>