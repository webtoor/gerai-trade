@extends('users.default')

@section('content')


<div class="container-fluid">
    <div class="row">
    @include('users.partials.sidebar')
    <div class="col-sm-10">

    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top:10px;">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#wishlist" role="tab" aria-controls="wishlist" aria-selected="true">Alamat Pengirim</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="pengaturan" role="tabpanel" aria-labelledby="wishlist-tab">

                    <div class="row" style="margin-top:40px;">
                      <div class="col-sm-12">
                          @include('admin.partials.messages') 
                       {{--  @if(count($alamat) < 1)
                        <button data-toggle="modal" data-target="#addAlamat" class="btn btn-dark btn-md" title="{{ trans('Tambah Alamat') }}">
                          <b><i class="fa fa-plus"></i> Tambah Alamat</b></button> 
                        @endif --}}
                                              <div class="mT-20">
                            <table class="table" cellspacing="0" width="100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Nama Pengirim</th>
                                        <th>Alamat Pengirim</th>
                                        <th>Daerah Pengirim</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($alamat as $alamats)
                                    <tr>
                                        <td><div class="br">{{$alamats->user->nama_hub}}</div>
                                          <div style="font-size:12px;">{{$alamats->user->nomor_ponsel}}</div>
                                        </td>
                                        <td>{{$alamats->alamat}} </td>
                                        <td><div class="br">{{$alamats->province_name}}, {{$alamats->city_name}}</div> {{$alamats->kecamatan_name}}, {{$alamats->kodepos}}</div></td>
                                        <td>

                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <button id="ubahAlamats" data-toggle="modal" data-target="#ubahAlamat" title="{{ trans('Lihat Detail') }}" class="btn btn-dark px-3 btn-sm"
                                                    data-user_id = "{{$alamats->user->id}}" data-uid="{{$alamats->id}}" data-unomor_ponsel="{{$alamats->user->nomor_ponsel}}" data-ualamat="{{$alamats->alamat}}"
                                                ><span class="ti-pencil"></span>
                                                      Ubah
                                                </button>
                                                </li>
                                              {{--   <li class="list-inline-item">
                                                    {!! Form::open([
                                                        'class'=>'delete',
                                                        'url'  => route('delete-alamat', $alamats->id), 
                                                        'method' => 'DELETE',
                                                        ]) 
                                                    !!}
                                                        <button class="btn btn-danger px-3 btn-sm" title="{{ trans('app.delete_title') }}"><i class="ti-trash"></i>Hapus</button>
                                                        
                                                    {!! Form::close() !!}
                                                </li> --}}
                                        </ul>
                                        </td>
                                        
                                      
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                             
                     </div>
                           
            </div>
          </div>    
    </div>
    </div>       
</div>


 <!-- Modal Ubah Alamat-->
 <div class="modal fade" id="ubahAlamat" tabindex="-1" role="dialog" aria-labelledby="ubahAlamat" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
            {!! Form::open([ 'route' => ['home.ubah-alamat'], 'method' => "PUT"])!!}
  
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addKategoriLabel">Ubah Alamat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputPassword4">Nomor Hp <sup style="color:red"> *Wajib</sup></label>
            <input type="number" class="form-control" name="unomor_ponsel" id="unomor_ponsel" required>
          </div>
        </div>
        <div class="form-group">
          <label>Alamat <sup style="color:red"> *Wajib</sup></label>
          <textarea type="text" class="form-control" name="ualamat" id="ualamat" required></textarea>
      </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Provinsi <sup style="color:red"> *Wajib</sup></label>
            <select class="form-control" name="uprovince_id" id="uselectProvinsi" required>
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
            <label>Kota/Kabupaten <sup style="color:red"> *Wajib</sup></label>
            <select class="form-control" name="ucity_id" id="uselectKotaKab" required="true" disabled="disabled">
                <option selected value="">Pilih Kota/Kabupaten</option>
        
          </select>       
         </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Kecamatan <sup style="color:red"> *Wajib</sup></label>
            <select class="form-control" name="ukecamatan_id" id="uselectKecamatan" required="true">
              <option selected value="">Pilih Kecamatan</option>
        
          </select>
          </div>
          <div class="form-group col-md-6">
              <label>Kode Pos</label>
              <input type="text" id="ukodepos" name="ukodepos" class="form-control">
        
              </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" id="uid" name="alamat_id" value="uid" required>
            <input type="hidden" id="user_id" name="user_id" value="user_id" required>

            <input type="hidden" name="uprovince_name" id="uprovince_name">
            <input type="hidden" name="ucity_name" id="ucity_name">
            <input type="hidden" name="ukecamatan_name" id="ukecamatan_name">
            <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Tutup</button>

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
        $('button#submits').click(function () {
        var provinsi = $("#selectProvinsi").val();
        var kota_kab = $("#selectKotaKab").val();
        var kecamatanz = $("#selectKecamatan").val();
        var kelurahan = $("#selectKelurahanDesa").val();
        if((provinsi == undefined) || (kota_kab == undefined) || (kecamatanz == undefined) ||(kelurahan == undefined)){
            alert('Provinsi, Kota/Kabupaten, Kecamatan dan Kelurahan/Desa Harus diisi!!!')
            return false;
        }else{
            return true;
        }
    });

    // UBAH ALAMAT

    $('select#uselectProvinsi').on('change', function (e) {
    let optionSelected = $("option:selected", this);
    let provinceName = $("option:selected", this).text();
    $("#uprovince_name").val(provinceName);

    let valueSelected = this.value;
    console.log(valueSelected)
    if(valueSelected){
        $("#uselectKotaKab").prop('disabled', false);
        $("#uselectKotaKab option").remove();
        $('#uselectKotaKab').append($('<option>', {value:'', text:'Pilih Kota/Kabupaten'}, '</option>'));
        $("#ucity_name").val("");

        $("#uselectKecamatan").prop('disabled', true);
        $("#uselectKecamatan option").remove();
        $('#uselectKecamatan').append($('<option>', {value:'', text:'Pilih Kecamatan'}, '</option>'));
        $("#ukecamatan_name").val("");

    }else{

        $("#uselectKotaKab").prop('disabled', true);
        $("#uselectKotaKab option").remove();
        $('#uselectKotaKab').append($('<option>', {value:'', text:'Pilih Kota/Kabupaten'}, '</option>'));
        $("#uselectKecamatan").prop('disabled', true);
        $("#uselectKecamatan option").remove();
        $('#uselectKecamatan').append($('<option>', {value:'', text:'Pilih Kecamatan'}, '</option>'));
    }

    $.ajax({
          type: "GET",
          url : "{{ url('all-city') }}/" + valueSelected,
          dataType : "JSON",
          success:function(results){
            console.log(results['rajaongkir']['results'])
            $.each( results['rajaongkir']['results'], function(index, data) {
                $('#uselectKotaKab').append($('<option>', { value:data['city_id'], text:data['type'] + " " + data['city_name']}, '</option>'));
           })
          }
        });
    });

    $('select#uselectKotaKab').on('change', function (e) {
    let optionSelected = $("option:selected", this);
    let valueSelected = this.value;
    let cityName = $("option:selected", this).text();
    $("#ucity_name").val(cityName);

    console.log(valueSelected)
    if(valueSelected != ''){
        $("#uselectKecamatan").prop('disabled', false);
        $("#uselectKecamatan option").remove();
        $('#uselectKecamatan').append($('<option>', {value:'', text:'Pilih Kecamatan'}, '</option>'));
        $("#ukecamatan_name").val("");

    }else{
        $("#uselectKecamatan").prop('disabled', true);
        $("#uselectKecamatan option").remove();
        $('#selectKecamatan').append($('<option>', {value:'', text:'Pilih Kecamatan'}, '</option>'));
        $("#ukecamatan_name").val("");

    }

    $.ajax({
          type: "GET",
          url : "{{ url('kecamatans') }}/" + valueSelected,
          dataType : "JSON",
          success:function(results){
            console.log(results)
            $.each( results['rajaongkir']['results'], function(index, data) {
                $('#uselectKecamatan').append($('<option>', { value:data['subdistrict_id'], text:data['subdistrict_name']}, '</option>'));
           })

          }
        });
    });

    $('select#uselectKecamatan').on('change', function (e) {
        let kecamatanName = $("option:selected", this).text();
        $("#ukecamatan_name").val(kecamatanName);

    });
    $("button#ubahAlamats").click(function () {
            var uid = $(this).data('uid');
            var user_id = $(this).data('user_id');
            var unomor_ponsel = $(this).data('unomor_ponsel');
            var ualamat = $(this).data('ualamat');

              console.log(unomor_ponsel)
            $('#uid').val(uid);
            $('#user_id').val(user_id);

            $('#unomor_ponsel').val(unomor_ponsel);
            $('#ualamat').val(ualamat);


        });
  
});
</script>
    
@endsection