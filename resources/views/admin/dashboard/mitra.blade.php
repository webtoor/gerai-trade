@extends('admin.default')

@section('content')
<div class="text-center">
    <b>User</b>
    <h4 class="c-blue-900"><b>Data Hub</b></h4>
</div>
<div class="bgc-white p-20 bd">
    <button id="tambahMitras "data-toggle="modal" data-target="#addMitra" class="btn btn-primary btn-md" title="{{ trans('Tambah Mitra') }}">
        <b><i class="fa fa-plus"></i> Tambah Hub</b></button>
    <div class="mT-30">
        <table id="dataTable" class="table table-bordered" cellspacing="0" width="100%">
            <thead class="thead-light">
                <tr>
                    <th>Nama Hub</th>
                    <th>Nama Perwakilan Hub</th>
                    <th>Email</th>
                    <th>Nomor Ponsel</th>
                    <th>Join</th>
                    <th>Action</th>
               </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($mitra as $mitras)
                <tr>
                    <td>{{$mitras->user->nama_hub}}</td>
                    <td>{{$mitras->user->nama_depan}} {{$mitras->user->nama_belakang}}</td>
                    <td>{{$mitras->user->email}}</td>
                    <td>{{$mitras->user->nomor_ponsel}}</td>
                    <td>{{ date("j M Y", strtotime($mitras->user->updated_at))}}</td>
                    <td>
                        <ul class="list-inline">
                                <li class="list-inline-item">
                                    <button id="showModalMitra" data-toggle="modal" data-target="#showMitra" title="{{ trans('Lihat Detail') }}" class="btn btn-dark px-3 btn-sm"
                                data-nama="{{$mitras->user->nama_depan}} {{$mitras->user->nama_belakang}}" data-alamat="{{$mitras->alamat['alamat']}}" data-provinsi="{{$mitras->alamat['province_name']}}" data-city="{{$mitras->alamat['city_name']}}" data-kecamatan="{{$mitras->alamat['kecamatan_name']}}"
                                data-kodeposs="{{$mitras->alamat['kodepos']}}"
                                >
                                        <span class="ti-zoom-in"></span>
                                </button>
                                </li>
                                <li class="list-inline-item">
                                        <a href="{{route('admin-panel.editHub', ['user_id' => $mitras->user->id])}}" title="{{ trans('Edit Hub') }}" class="btn btn-info px-3 btn-sm">
                                            <span class="ti-pencil"></span>
                                        </a>
                                    </li>
                                <li class="list-inline-item">
                                        {!! Form::open([
                                            'class'=>'delete',
                                            'url'  => route('admin-panel.deleteMitra', $mitras->user->id), 
                                            'method' => 'DELETE',
                                            ]) 
                                        !!}
                                            <button class="btn btn-danger px-3 btn-sm" title="{{ trans('Hapus Hub') }}"><i class="ti-trash"></i></button>
                                            
                                        {!! Form::close() !!}
                                    </li>
                        </ul>
                    </td>
                  
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="showMitra" tabindex="-1" role="dialog" aria-labelledby="showMitraLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="showMitraLabel">Detail Hub</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
          <div id="alamat"> </div>
          <div id="provinsi"> </div>
          <div id="kota_kabs"> </div>
          <div id="kecamatans"> </div>
          <div id="kodeposs"> </div>
          </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addMitra" tabindex="-1" role="dialog" aria-labelledby="addMitraLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
                {!! Form::open([ 'route' => ['admin-panel.addMitra'], 'method' => "POST"])!!}
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addMitraLabel">Tambah Hub</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Nama Hub/Brand <sup style="color:red"> *Wajib</sup></label>
                            <input type="text" class="form-control" name="nama_hub" placeholder="Masukan Nama Hub/Brand" required>
                        </div>
                </div>
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nama Depan <sup style="color:red"> *Wajib</sup></label>
                        <input type="text" class="form-control" name="nama_depan" placeholder="Nama Depan" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nama Belakang <sup style="color:red"> *Wajib</sup></label>
                        <input type="text" class="form-control" name="nama_belakang" placeholder="Nama Belakang" required>
                    </div>
            </div>
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Email <sup style="color:red"> *Wajib</sup></label>
                        <input type="email" class="form-control" name="email" placeholder="Masukan Email" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nomor Ponsel <sup style="color:red"> *Wajib</sup></label>
                        <input type="number" name="nomor_ponsel" class="form-control" placeholder="Masukan Nomor Ponsel" required>
                    </div>
            </div>
            <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Alamat <sup style="color:red"> *Wajib</sup></label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat" required>
                    </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Provinsi <sup style="color:red"> *Wajib</sup></label>
                        <select class="form-control" name="province_id" id="selectProvinsi" required>
                        <option selected value="">Pilih Provinsi</option>
                            @php
                            $province = province();
                            $province = json_decode($province,true);
                        @endphp
                        @foreach($province['rajaongkir']['results'] as $provinces)
                            <option value="{{ $provinces['province_id'] }}">{{ $provinces['province'] }} </option>
                            @endforeach  
                        </select>
                </div>
                <div class="form-group col-md-6">
                        <label>Kota atau Kabupaten <sup style="color:red"> *Wajib</sup></label>
                            <select class="form-control" name="city_id" id="selectKotaKab" required disabled="disabled">
                                <option selected value="">Pilih Kota/Kabupaten</option>
                            </select>
                    </div>
              
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
                <label>Kecamatan <sup style="color:red"> *Wajib</sup></label>
                    <select class="form-control" name="kecamatan_id" id="selectKecamatan" required disabled="disabled">
                        <option selected value="">Pilih Kecamatan</option>
                    </select>
            </div>
            <div class="form-group col-md-6">
                    <label>Kode Pos</label>
                    <input type="text" id="kodepos" name="kodepos" class="form-control">
                       {{--  <select class="form-control" name="kelurahan_desa" id="selectKelurahanDesa" required disabled="disabled">
                            <option selected value="0">Pilih Kelurahan/Desa</option>
                        </select> --}}
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Password <sup style="color:red"> *Wajib</sup></label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Ulangi Password <sup style="color:red"> *Wajib</sup></label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi Password" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="province_name" id="province_name">
                <input type="hidden" name="city_name" id="city_name">
                <input type="hidden" name="kecamatan_name" id="kecamatan_name">

              <button type="submit" class="btn btn-primary btn-md">Submit</button>
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
@endsection
@section('js')
<script>
$(document).ready(function () {

   
    $('select#selectProvinsi').on('change', function (e) {
    let optionSelected = $("option:selected", this);
    let provinceName = $("option:selected", this).text();
    $("#province_name").val(provinceName);

    let valueSelected = this.value;
    console.log(valueSelected)
    if(valueSelected){
        $("#selectKotaKab").prop('disabled', false);
        $("#selectKotaKab option").remove();
        $('#selectKotaKab').append($('<option>', {value:'', text:'Pilih Kota/Kabupaten'}, '</option>'));
        $("#city_name").val("");

        $("#selectKecamatan").prop('disabled', true);
        $("#selectKecamatan option").remove();
        $('#selectKecamatan').append($('<option>', {value:'', text:'Pilih Kecamatan'}, '</option>'));
        $("#kecamatan_name").val("");

    }else{

        $("#selectKotaKab").prop('disabled', true);
        $("#selectKotaKab option").remove();
        $('#selectKotaKab').append($('<option>', {value:'', text:'Pilih Kota/Kabupaten'}, '</option>'));
        $("#selectKecamatan").prop('disabled', true);
        $("#selectKecamatan option").remove();
        $('#selectKecamatan').append($('<option>', {value:'', text:'Pilih Kecamatan'}, '</option>'));
    }

    $.ajax({
          type: "GET",
          url : "{{ url('all-city') }}/" + valueSelected,
          dataType : "JSON",
          success:function(results){
            console.log(results['rajaongkir']['results'])
            $.each( results['rajaongkir']['results'], function(index, data) {
                $('#selectKotaKab').append($('<option>', { value:data['city_id'], text:data['type'] + " " + data['city_name']}, '</option>'));
           })
          }
        });
    });

    $('select#selectKotaKab').on('change', function (e) {
    let optionSelected = $("option:selected", this);
    let valueSelected = this.value;
    let cityName = $("option:selected", this).text();
    $("#city_name").val(cityName);

    console.log(valueSelected)
    if(valueSelected != ''){
        $("#selectKecamatan").prop('disabled', false);
        $("#selectKecamatan option").remove();
        $('#selectKecamatan').append($('<option>', {value:'', text:'Pilih Kecamatan'}, '</option>'));
        $("#kecamatan_name").val("");

    }else{
        $("#selectKecamatan").prop('disabled', true);
        $("#selectKecamatan option").remove();
        $('#selectKecamatan').append($('<option>', {value:'', text:'Pilih Kecamatan'}, '</option>'));
        $("#kecamatan_name").val("");

    }

    $.ajax({
          type: "GET",
          url : "{{ url('kecamatans') }}/" + valueSelected,
          dataType : "JSON",
          success:function(results){
            console.log(results)
            $.each( results['rajaongkir']['results'], function(index, data) {
                $('#selectKecamatan').append($('<option>', { value:data['subdistrict_id'], text:data['subdistrict_name']}, '</option>'));
           })

          }
        });
    });

    $('select#selectKecamatan').on('change', function (e) {
        let kecamatanName = $("option:selected", this).text();
        $("#kecamatan_name").val(kecamatanName);

    });
/* 
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
    }); */

    $("#dataTable" ).on( "click","button#showModalMitra", function() {
            var alamat = $(this).data('alamat');
            var provinsi = $(this).data('provinsi');
            var city = $(this).data('city');
            var kecamatan = $(this).data('kecamatan');
            var kodeposs = $(this).data('kodeposs')

            $('#alamat').html('Alamat : '+ alamat);
            $('#provinsi').html('Provinsi : '+ provinsi);
            $('#kota_kabs').html('Kota/Kabupaten : ' + city);
            $('#kecamatans').html('Kecamatan : ' + kecamatan);
            $('#kodeposs').html('Kode Pos : ' + kodeposs);
            /* if(city && kecamatan){
                $.ajax({
                    type: "GET",
                    url : "{{ url('show-alamat') }}/" + city + '/' + kecamatan,
                    dataType : "JSON",
                    success:function(results){
                    console.log(results)
                    if(results.rajaongkir){
                    $('#provinsi').html('Provinsi : '+ results.rajaongkir.results.province);
                    $('#kota_kabs').html('Kota/Kabupaten : '+ results.rajaongkir.results.city);
                    $('#kecamatans').html('Kecamatan : '+ results.rajaongkir.results.subdistrict_name);
                    $('#kodeposs').html('Kode Pos : '+ kodeposs);
                    }
                }
            });
            }else{
                $('#alamat').html('');
                $('#provinsi').html('Gagal Mendapatkan Data, Silakan Coba Lagi Nanti');
                $('#kota_kabs').html('');
                $('#kecamatans').html('');
                $('#kodeposs').html('');
            } */
           
        });
});
</script>

@endsection
