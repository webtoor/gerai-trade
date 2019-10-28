<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../vendors/animate/animate.css">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="../vendors/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../vendors/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../vendors/select2/select2.min.css">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="../vendors/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../css/util.css">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!--===============================================================================================-->
    </head>
    <body>
    <div id="app">
        
        <main class="py-0">
            
                <div class="limiter">
                        <div class="container-login100">
                            
                            <div class="login100-more" style="">
                                 
                            </div>
                    
                            <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
                                    <a href="/register" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-5">
                                        <i class="fa fa-long-arrow-left m-l-5"></i>  Kembali
                                    </a>
                        
                                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <span class="login100-form-title p-b-59">
                                       Jadilah Mitra Kami
                                    </span>
                    
                                    <div class="wrap-input100" style="margin-top:-20px;">
                                        <span class="label-input100">Pilih Provinsi</span>
                                        <select class="input100" name="provinsi" id="selectProvinsi" required>
                                                <option selected value="0">Pilih Provinsi</option>
                                                @foreach ($provinsi as $provinsi_item)
                                                <option value="{{$provinsi_item->id}}">{{$provinsi_item->name}}</option>
                                                @endforeach                                                
                                            </select>
                                        <span class="focus-input100"></span>
                                
                                    </div>
                    
                                    <div class="wrap-input100" style="margin-top:-20px;">
                                            <span class="label-input100">Pilih Kota/Kabupaten</span>
                                            <select class="input100" name="kota_kabupaten" id="selectKotaKab" required disabled="disabled">
                                                    <option selected value="0">Pilih Kota/Kabupaten</option>
                                              
                                                </select>
                                            <span class="focus-input100"></span>
                                    
                                        </div>
                                    
                                        <div class="wrap-input100" style="margin-top:-20px;">
                                                <span class="label-input100">Pilih Kecamatan</span>
                                                <select class="input100" name="kecamatan" id="selectKecamatan" required disabled="disabled">
                                                        <option selected value="0">Pilih Kecamatan</option>
                                                  
                                                    </select>
                                                <span class="focus-input100"></span>
                                        
                                            </div>
                                        <div class="wrap-input100" style="margin-top:-20px;">
                                                <span class="label-input100">Pilih Kelurahan/Desa</span>
                                                <select class="input100" name="kelurahan_desa" id="selectKelurahanDesa" required disabled="disabled">
                                                        <option selected value="0">Pilih Kelurahan/ Desa</option>
                                                    
                                                    </select>
                                                <span class="focus-input100"></span>
                                        
                                            </div>
                                    <div class="container-login100-form-btn" style="margin-top:-20px">
                                        <div class="wrap-login100-form-btn">
                                            <div class="login100-form-bgbtn"></div>
                                            <button class="login100-form-btn" type="submit">
                                                Submit
                                            </button>
                                        </div>
                                </form>
                    
                               
                            </div>
                        </div>
                    </div>
                    </div>       
                 </main>
    </div>
    <!--===============================================================================================-->
	<script src="../vendors/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
        <script src="../vendors/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <!--===============================================================================================-->
        <script src="../vendors/select2/select2.min.js"></script>
    <!--===============================================================================================-->
        <script src="../vendors/daterangepicker/moment.min.js"></script>
        <script src="../vendors/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
        <script src="../vendors/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
        <script src="../js/main.js"></script>
        <!--===============================================================================================-->
	<script src="../vendors/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
    </script>
    <script>
    $(document).ready(function () {
    $('select#selectProvinsi').on('change', function (e) {
    let optionSelected = $("option:selected", this);
    let valueSelected = this.value;
    console.log(valueSelected)
    if(valueSelected != 0){
        $("#selectKotaKab").prop('disabled', false);
        $("#selectKotaKab option").remove();

    }else{
        $("#selectKotaKab").prop('disabled', true);
        $("#selectKotaKab option").remove();
        $('#selectKotaKab').append($('<option>', {value:'0', text:'Pilih Kota/Kabupaten'}, '</option>'));
        $("#selectKecamatan").prop('disabled', true);
        $("#selectKecamatan option").remove();
        $('#selectKecamatan').append($('<option>', {value:'0', text:'Pilih Kecamatan'}, '</option>'));
    }

    $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        contentType: "application/json",
        dataType: "json",
        type: 'GET',
        url: "/ajax-kota-kab/" + valueSelected,
        success: function (results) {
          console.log(results);
          $.each( results['data'], function(index, data) {
                $('#selectKotaKab').append($('<option>', {value:data['id'], text:data['name']}, '</option>'));
           })
          }

      });
    });

    $('select#selectKotaKab').on('change', function (e) {
    let optionSelected = $("option:selected", this);
    let valueSelected = this.value;

    console.log(valueSelected)
    if(valueSelected != 0){
        $("#selectKecamatan").prop('disabled', false);
        $("#selectKecamatan option").remove();

    }else{
        $("#selectKecamatan").prop('disabled', true);
        $('#selectKecamatan').append($('<option>', {value:'0', text:'Pilih Kecamatan'}, '</option>'));

    }

    $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        contentType: "application/json",
        dataType: "json",
        type: 'GET',
        url: "/kecamatan/" + valueSelected,
        success: function (results) {
          console.log(results);
          $.each( results['data'], function(index, data) {
                $('#selectKecamatan').append($('<option>', {value:data['id'], text:data['name']}, '</option>'));
           })
          }

      });
    });

    $('select#selectKecamatan').on('change', function (e) {
    let optionSelected = $("option:selected", this);
    let valueSelected = this.value;

    console.log(valueSelected)
    if(valueSelected != 0){
        $("#selectKelurahanDesa").prop('disabled', false);
        $("#selectKelurahanDesa option").remove();

    }else{
        $("#selectKelurahanDesa").prop('disabled', true);
        $('#selectKelurahanDesa').append($('<option>', {value:'0', text:'Pilih Kelurahan/Desa'}, '</option>'));

    }

    $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        contentType: "application/json",
        dataType: "json",
        type: 'GET',
        url: "/kelurahan-desa/" + valueSelected,
        success: function (results) {
          console.log(results);
          $.each( results['data'], function(index, data) {
                $('#selectKelurahanDesa').append($('<option>', {value:data['id'], text:data['name']}, '</option>'));
           })
          }

      });
    });
});
    </script>
<!--===============================================================================================-->
</body>
</html>
