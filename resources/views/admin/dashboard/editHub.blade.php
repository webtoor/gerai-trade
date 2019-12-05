@extends('admin.default')

@section('content')
<div class="text-center">
    <b>Kelola Hub</b>
    <h4 class="c-blue-900"><b>Edit Hub</b></h4>
</div>
<br>

<div class="bgc-white p-20 bd">
    {!! Form::open([
        'url'  => route('admin-panel.updateHub', $hub->id), 
        'method' => 'PUT',
        ]) !!}  

<div class="form-row">
        <div class="form-group col-md-12">
            <label>Nama Hub/Brand <sup style="color:red"> *Wajib</sup></label>
        <input type="text" class="form-control" name="nama_hub" value="{{$hub->nama_hub}}" required>
        </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label>Nama Depan <sup style="color:red"> *Wajib</sup></label>
        <input type="text" class="form-control" name="nama_depan" value="{{$hub->nama_depan}}" required>
    </div>
    <div class="form-group col-md-6">
        <label>Nama Belakang <sup style="color:red"> *Wajib</sup></label>
        <input type="text" class="form-control" name="nama_belakang" value="{{$hub->nama_belakang}}" required>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label>Email <sup style="color:red"> *Wajib</sup></label>
        <input type="email" class="form-control" name="email" value="{{$hub->email}}" required>
    </div>
    <div class="form-group col-md-6">
        <label>Nomor Ponsel <sup style="color:red"> *Wajib</sup></label>
        <input type="number" name="nomor_ponsel" class="form-control" value="{{$hub->nomor_ponsel}}" required>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <label>Alamat <sup style="color:red"> *Wajib</sup></label>
        <input type="text" class="form-control" name="alamat" value="{{$hub->alamat->alamat}}" required>
    </div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
    <label>Provinsi <sup style="color:red"> *Wajib</sup></label>
        <select class="form-control" name="province_id" id="selectProvinsi" required>
        @php
            $province = province();
            $province = json_decode($province,true);
        @endphp
        @foreach($province['rajaongkir']['results'] as $provinces)
        @if($hub->alamat->province_id == $provinces['province_id'])
        <option value="{{ $provinces['province_id'] }}" selected>{{ $provinces['province'] }} </option>
        @else
        <option value="{{ $provinces['province_id'] }}">{{ $provinces['province'] }} </option>
        @endif
        @endforeach  
        </select>
</div>
<div class="form-group col-md-6">
        <label>Kota atau Kabupaten <sup style="color:red"> *Wajib</sup></label>
            <select class="form-control" name="city_id" id="selectKotaKab" required>
                    @php
                    $cityAll = allcity($hub->alamat->province_id);
                    $cityAll = json_decode($cityAll,true);
                @endphp
                @foreach($cityAll['rajaongkir']['results'] as $cityAlls)
                @if($hub->alamat->city_id == $cityAlls['city_id'])
                <option value="{{ $cityAlls['city_id'] }}" selected>{{ $cityAlls['city_name'] }} </option>
                @else
                <option value="{{ $cityAlls['city_id'] }}">{{ $cityAlls['city_name'] }} 
                </option>
                @endif
                @endforeach            
              </select>
    </div>

</div>
<div class="form-row">
<div class="form-group col-md-6">
<label>Kecamatan <sup style="color:red"> *Wajib</sup></label>
    <select class="form-control" name="kecamatan_id" id="selectKecamatan" required>
            @php
            $cityAll = kecamatan($hub->alamat->city_id);
            $cityAll = json_decode($cityAll,true);
        @endphp
        @foreach($cityAll['rajaongkir']['results'] as $kecamatans)
        @if($hub->alamat->city_id == $kecamatans['city_id'])
        <option value="{{ $kecamatans['subdistrict_id'] }}" selected>{{ $kecamatans['subdistrict_name'] }} </option>
        @else
        <option value="{{ $kecamatans['subdistrict_id'] }}">{{ $kecamatans['subdistrict_name'] }} 
        </option>
        @endif
        @endforeach  
    </select>
</div>
<div class="form-group col-md-6">
    <label>Kode Pos</label>
<input type="text" id="kodepos" name="kodepos" class="form-control" value="{{$hub->alamat->kodepos}}">
    </div>
    
</div>
<div class="text-right">
<input type="hidden" name="alamat_id" value="{{$hub->alamat->id}}">
<input type="hidden" name="province_name" id="province_name" value="{{$hub->alamat->province_name}}">
<input type="hidden" name="city_name" id="city_name" value="{{$hub->alamat->city_name}}">
<input type="hidden" name="kecamatan_name" id="kecamatan_name" value="{{$hub->alamat->kecamatan_name}}">
        <button type="submit" class="btn btn-primary btn-md right">Submit</button>

</div>

</div>
{!! Form::close() !!}      

@endsection
@section('js')
<script>
$(document).ready(function() {
    $('select#selectProvinsi').on('change', function (e) {
    let optionSelected = $("option:selected", this);
    let valueSelected = this.value;
    console.log(valueSelected)

    let provinceName = $("option:selected", this).text();
    $("#province_name").val(provinceName);
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
        $('#selectKecamatan').append($('<option>', {value:'0', text:'Pilih Kecamatan'}, '</option>'));
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
});
    </script>
@endsection
