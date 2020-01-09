


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
   {{--  {{Cart::instance('default')->content()}} --}}
    @if(count(Cart::instance('default')->content()))
        <div class="container" style="margin-top:-30px; margin-bottom:100px;">
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
                          {{$alamat->alamat}}, {{$alamat->province_name}}, {{$alamat->city_name}}, {{$alamat->kecamatan_name}}, {{$alamat->kodepos}}

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
                      @foreach($origin as $hub)
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Produk</th>
                          <th>Jumlah</th>
                          <th>Harga</th>
                          <th>Berat</th>
                          <th>Catatan</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach(Cart::content('default') as $row) :?>
                          @if($hub->user_id == $row->options->hub_id)
                        <tr>
                          <td><a href="{{route('produk-detail', ['slug_produk' => $row->options->slug])}}" style="color:#3f51b5; font-weight:bold"><?php echo \Illuminate\Support\Str::limit($row->name, 20) ?></a></td>
                          <td>
                            {{$row->qty}}
                          </td>
                          <td>Rp {{number_format($row->price,0, ".", ".")}}</td>
                        <td>{{$row->options->weight}} gram</td>
                        <td><textarea name="ctt[]" id="{{$row->id}}"></textarea></td>
                        </tr>
                        <input type="hidden" name="result_id[]" value="{{$row->id}}" id="id_produkselectDurasi{{$row->options->hub_id}}">
                        @endif
                    <?php endforeach;?>
                   
                      </tbody>
                      <tfoot>
                       
                      </tfoot>
                    </table>
                 
                    @if($alamat)
                    <form action="javascript:void(0);">
                    <div class="form-row">
                    <div class="form-group col-sm-4">
                          <label>Pilih Ekspedisi</label>
                          <select class="form-control" name="eks" id="eks" data-target="{{$hub->user_id}}" required>
                            <option value="">Pilih Ekspedisi</option>
                            <option value="jne">JNE</option>
                            <option value="jnt">J&T</option>
                            <option value="pos">POS</option>
                            <option value="tiki">TIKI</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-8">
                            <label>Pilih Durasi Pengiriman</label>
                            <select class="form-control selectDurasi" id="selectDurasi{{$hub->user_id}}" name="selectDurasi" data-target="{{$hub->user_id}}" required="true" disabled>   
                                <option value="">Pilih Durasi Pengiriman</option>
                            </select>
                          </div>
                          <input type="hidden" value="{{$hub->kecamatan_id}}" id="districts_origin{{$hub->user_id}}">
                        <input type="hidden" value="{{$hub->user_id}}" id="hub_id{{$hub->user_id}}">

                    </div>
                    @endif

                    @endforeach
                    @if($alamat)

                  <input type="hidden" id="districts_destination" value="{{$alamat->kecamatan_id}}" name="districts_destination">
                  @endif
                  </div>
              
              </div>
          
            </div>
           
            <div class="col-lg-4" style="margin-top:100px;">
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
                              <button id="submit" class="btn btn btn-info btn-block" disabled="true"><b>BAYAR SEKARANG</b></button>
                            </div>
                          </div>
                        </form>
            
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
    <script type="text/javascript">

      $(document).ready(function () {
        $("button#submit").click(function () {
         /*  var checkout = {
            'courier': $('#eks').val(),
            'id_produk': $("#id_produkselectDurasi9").attr("name"),
          } */
          /* var values = $("input[id='harga_produkselectDurasi9']")
              .map(function(){return $(this).val();}).get();
          var harga_produk = values.map(parseFloat); */
          var ctts = $('textarea[name="ctt[]"]').map(function(){
              return this.value;
            }).get();
        
          var catats = {
            'data' : selectById,
            'ctt' : ctts
          }
          console.log(catats);
          if(selectById.length > 0){
            $.ajax({
              headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              contentType: "application/json",
              dataType: "json",
              type: 'POST',
              url : "{{ route('home.ajaxPostCheckout')}}",
              data: JSON.stringify(catats),
              success:function(results){
                if(results.status == 1){
                  console.log(results)
                  location.replace("{{route('home.getWaitPayment')}}");
                  

                }else{
                  alert('Maaf, Terjadi kesalahan, silakan coba lagi nanti')
                }
             

              }
            });
          }


          });
        $('select#eks').on('change', function (e) {
           var counts = $(this).attr('data-target');

           if(counts){
            let optionSelected = $("option:selected", this);
            let valueSelected = this.value;
            var params = {
              'hub_id' : $('#hub_id' + counts).val(),
              'districts_origin': $('#districts_origin' + counts).val(),
              'districts_destination': $('#districts_destination').val(),
              'eks' : valueSelected
            }

            console.log(params)
            //var idDinamic = "#selectDurasi"+counts+" option";
              if(valueSelected != ''){
              $("#selectDurasi" + counts).prop('disabled', false);
              $("#selectDurasi"+counts+" option").remove();
              $("#selectDurasi"+counts).append($('<option>', {value:'', text:'Pilih Durasi Pengiriman'}, '</option>'));
              $("#submit").prop('disabled', false);

              }else{
              $("#selectDurasi" + counts).prop('disabled', true);
              $("#selectDurasi"+counts+" option").remove();
              $("#selectDurasi"+counts).append($('<option>', {value:'', text:'Pilih Durasi Pengiriman'}, '</option>'));
              $("#submit").prop('disabled', true);

              }

            if(params['eks'] && params['districts_origin'] && params['districts_destination'] && params['hub_id']){
              $.ajax({
              headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              contentType: "application/json",
              dataType: "json",
              type: 'POST',
              url : "{{ url('cek-ongkir') }}",
              data: JSON.stringify(params),
              success:function(results){
              console.log(results.rajaongkir.results[0])
              $("#submit").prop('disabled', true);

              $.each(results.rajaongkir.results[0].costs, function(index, data) {
                $("#selectDurasi"+ counts).prop('disabled', false);
                if(data['cost'][0]['etd']){
                  $('#selectDurasi'+ counts).append($('<option>', {value:data['cost'][0]['value'] + '#' + data['service'] + '#' + results.rajaongkir.results[0].code, text:data['service'] + ' (' + data['cost'][0]['etd'] + ' Hari) ' + ' (Rp '  +  data['cost'][0]['value'] + ')'}, '</option>'));
                }else{
                  $('#selectDurasi'+ counts).append($('<option>', {value:data['cost'][0]['value'] + '#' + data['service'] + '#' + results.rajaongkir.results[0].code, text:data['service'] + ' (Rp '  +  data['cost'][0]['value'] + ')'}, '</option>'));
                }
              })

              }
            });
          }

           }
            
          });
         
          let selectById = [];
          $('select.selectDurasi').on('change', function (e) {
            var total_ongkir = 0;
            var total_tagihan = 0;
            var data_val = $(this).attr('id');  
            var count = $(this).attr('data-target');

            if( $('select#' + data_val)){
              var id_produk = $("input[id='id_produk"+data_val+"']").map(function(){return $(this).val();}).get();
          
              console.log(id_produk)
              let optionSelected = $("option:selected", this);
              let valueSelected = this.value;
              console.log(valueSelected)
              if(valueSelected != ''){
                $("#submit").prop('disabled', false);
                var arrays = valueSelected.split("#");
                /* var id_produk[] = "";
                console.log(id_produk) */
                var res = {
                  'uniq' : data_val,
                  'ongkir' : parseInt(arrays[0]),
                  'courier' : arrays[1],
                };
          
                var index = selectById.findIndex(x => x.uniq == data_val)
                if (index === -1){
                  selectById.push({
                    'uniq' : data_val,
                    'ongkir' : parseInt(arrays[0]),
                    'service' : arrays[1],
                    'courier' : arrays[2],
                    'id_produk' : id_produk,
                    'hub_id' : $('#hub_id' + count).val(),
                    })
                }else{
                  selectById[index] = {
                    'uniq' : data_val,
                    'ongkir' : parseInt(arrays[0]),
                    'service' : arrays[1],
                    'courier' : arrays[2],
                    'id_produk' : id_produk,
                    'hub_id' : $('#hub_id' + count).val(),
                    }
                }
                console.log(selectById)
                $.each(selectById, function(index, data) {
                  total_ongkir += data['ongkir']
                }) 

                $("#totalongkir").html('Rp. ' + total_ongkir);
             
                var totalharga = "<?php echo str_replace(',','',Cart::instance('default')->total()); ?>";
                totaltagihan = parseInt(totalharga)+ parseInt(total_ongkir)
                $("#totaltagihan").html('Rp. ' + totaltagihan.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
              }else{
                $("#submit").prop('disabled', true);

              }
         
            
            }
          });

      });


      function check(){
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

/* 
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
            console.log(datas.rajaongkir.results[0].costs[1].cost[0].value)
            $("#ongkir").val(datas.rajaongkir.results[0].costs[1].cost[0].value);
            $("#totalongkir").html('Rp. ' + datas.rajaongkir.results[0].costs[1].cost[0].value.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
            var totalharga = "<?php echo str_replace(',','',Cart::instance('default')->total()); ?>";
            console.log(totalharga)
            console.log(parseInt(totalharga) + parseInt(datas.rajaongkir.results[0].costs[1].cost[0].value))
            var totaltagihan = parseInt(totalharga) + parseInt(datas.rajaongkir.results[0].costs[1].cost[0].value)
            $("#totaltagihan").html('Rp. ' + totaltagihan.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
          }
        });


      
      }); */
    </script>
</body>
</html>