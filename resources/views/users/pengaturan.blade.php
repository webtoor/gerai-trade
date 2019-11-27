@extends('users.default')

@section('content')


<div class="container-fluid">
    <div class="row">
    @include('users.partials.sidebar')
    <div class="col-sm-10">

    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top:10px;">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#wishlist" role="tab" aria-controls="wishlist" aria-selected="true">Alamat Pengiriman</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="pengaturan" role="tabpanel" aria-labelledby="wishlist-tab">

                    <div class="row" style="margin-top:40px;">
                      <div class="col-sm-12">
                          @include('admin.partials.messages') 

                        <button data-toggle="modal" data-target="#addAlamat" class="btn btn-dark btn-md" title="{{ trans('Tambah Alamat') }}">
                          <b><i class="fa fa-plus"></i> Tambah Alamat</b></button>                        <div class="mT-20">
                            <table class="table" cellspacing="0" width="100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Nama Penerima</th>
                                        <th>Alamat Pengiriman</th>
                                        <th>Daerah Pengiriman</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($alamat as $alamats)
                                    <tr>
                                        <td><div class="br">{{$alamats->nama_penerima}}</div>
                                          <div style="font-size:12px;">{{$alamats->nohp_penerima}}</div>
                                        </td>
                                        <td>{{$alamats->alamat}} </td>
                                        <td><div class="br">{{$alamats->provinsi->name}}, {{$alamats->kota_kabupatens->name}},</div> {{$alamats->kelurahan_desa->name}}, </div></td>
                                        <td>

                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <button id="ubahAlamats" data-toggle="modal" data-target="#ubahAlamat" title="{{ trans('Lihat Detail') }}" class="btn btn-dark px-3 btn-sm"
                                                data-iud="{{$alamats->id}}" data-unama_penerima="{{$alamats->nama_penerima}}" data-unohp_penerima="{{$alamats->nohp_penerima}}" data-ualamat="{{$alamats->alamat}}"
                                                data-uprovinsi="{{$alamats->provinsi->id}}" data-ukotakabs="{{$alamats->kota_kabupatens->id}}"><span class="ti-pencil"></span>
                                                      Ubah
                                                </button>
                                                </li>
                                                <li class="list-inline-item">
                                                    {!! Form::open([
                                                        'class'=>'delete',
                                                        'url'  => route('delete-alamat', $alamats->id), 
                                                        'method' => 'DELETE',
                                                        ]) 
                                                    !!}
                                                        <button class="btn btn-danger px-3 btn-sm" title="{{ trans('app.delete_title') }}"><i class="ti-trash"></i>Hapus</button>
                                                        
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
                             
                     </div>
                           
            </div>
          </div>    
    </div>
    </div>       
</div>
    <!-- Modal Tambah Alamat-->
<div class="modal fade" id="addAlamat" tabindex="-1" role="dialog" aria-labelledby="addKategoriLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
          {!! Form::open([ 'route' => ['post-alamat'], 'method' => "POST"])!!}

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addKategoriLabel">Alamat Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Nama Penerima</label>
          <input type="text" class="form-control" name="nama_penerima" placeholder="Masukan Nama Penerima" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Nomor Hp</label>
          <input type="number" class="form-control" name="nohp_penerima" placeholder="Masukan Nomor Hp" required>
        </div>
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <textarea type="text" class="form-control" name="alamat" placeholder="Masukan Alamat" required></textarea>
    </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Provinsi</label>
          <select class="form-control" name="provinsi" id="selectProvinsi" required="true">
              <option selected value="">Pilih Provinsi</option>

            @foreach ($provinsi as $provinsi_item)
            <option value="{{$provinsi_item->id}}">{{$provinsi_item->name}}</option>
            @endforeach                                                
        </select>
        </div>
        <div class="form-group col-md-6">
          <label>Kota/Kabupaten</label>
          <select class="form-control" name="kota_kabupaten" id="selectKotaKab" required disabled="disabled">
            <option selected value="">Pilih Kota/Kabupaten</option>
      
        </select>       
       </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Kecamatan</label>
          <select class="form-control" name="kecamatan" id="selectKecamatan" required disabled="disabled">
            <option selected value="">Pilih Kecamatan</option>
      
        </select>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Kelurahan/Desa</label>
          <select class="form-control" name="kelurahan_desa" id="selectKelurahanDesa" required disabled="disabled">
            <option selected value="">Pilih Kelurahan/ Desa</option>
        
        </select>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-md">Submit</button>
      </div>
      {!! Form::close() !!}

    </div>
  </div>
</div>


 <!-- Modal Ubah Alamat-->
 <div class="modal fade" id="ubahAlamat" tabindex="-1" role="dialog" aria-labelledby="ubahAlamat" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
            {!! Form::open([ 'route' => ['post-alamat'], 'method' => "POST"])!!}
  
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addKategoriLabel">Ubah Alamat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Nama Penerima</label>
            <input type="text" class="form-control" name="unama_penerima" id="unama_penerima" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Nomor Hp</label>
            <input type="number" class="form-control" name="unohp_penerima" id="unohp_penerima" required>
          </div>
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <textarea type="text" class="form-control" name="ualamat" id="ualamat" required></textarea>
      </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Provinsi</label>
            <select class="form-control" name="uprovinsi" id="uselectProvinsi" required="true">
                <option selected value="">Pilih Provinsi</option>

              @foreach ($provinsi as $provinsi_item)
              <option value="{{$provinsi_item->id}}">{{$provinsi_item->name}}</option>
              @endforeach                                                
          </select>
          </div>
          <div class="form-group col-md-6">
            <label>Kota/Kabupaten</label>
            <select class="form-control" name="ukota_kabupaten" id="uselectKotaKab" required disabled="disabled">
                <option selected value="">Pilih Kota/Kabupaten</option>
        
          </select>       
         </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Kecamatan</label>
            <select class="form-control" name="ukecamatan" id="uselectKecamatan" required disabled="disabled">
              <option selected value="">Pilih Kecamatan</option>
        
          </select>
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Kelurahan/Desa</label>
            <select class="form-control" name="ukelurahan_desa" id="uselectKelurahanDesa" required disabled="disabled">
              <option selected value="">Pilih Kelurahan/ Desa</option>
          
          </select>
          </div>
        </div>
        </div>
        <div class="modal-footer">
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
        $('#selectKotaKab').append($('<option>', {value:'', text:'Pilih Kota/Kabupaten'}, '</option>'));
        $("#selectKecamatan").prop('disabled', true);
        $("#selectKecamatan option").remove();
        $('#selectKecamatan').append($('<option>', {value:'', text:'Pilih Kecamatan'}, '</option>'));
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
        $('#selectKecamatan').append($('<option>', {value:'', text:'Pilih Kecamatan'}, '</option>'));

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
        $('#selectKelurahanDesa').append($('<option>', {value:'', text:'Pilih Kelurahan/Desa'}, '</option>'));

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

    //UBAH 
    $('select#uselectProvinsi').on('change', function (e) {
    let optionSelected = $("option:selected", this);
    let valueSelected = this.value;
    console.log(valueSelected)
    if(valueSelected != 0){
        $("#uselectKotaKab").prop('disabled', false);
        $("#uselectKotaKab option").remove();

    }else{
        $("#uselectKotaKab").prop('disabled', true);
        $("#uselectKotaKab option").remove();
        $('#uselectKotaKab').append($('<option>', {value:'', text:'Pilih Kota/Kabupaten'}, '</option>'));
        $("#uselectKecamatan").prop('disabled', true);
        $("#uselectKecamatan option").remove();
        $('#uselectKecamatan').append($('<option>', {value:'', text:'Pilih Kecamatan'}, '</option>'));
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
                $('#uselectKotaKab').append($('<option>', {value:data['id'], text:data['name']}, '</option>'));
           })
          }

      });
    });

    $('select#uselectKotaKab').on('change', function (e) {
    let optionSelected = $("option:selected", this);
    let valueSelected = this.value;

    console.log(valueSelected)
    if(valueSelected != 0){
        $("#uselectKecamatan").prop('disabled', false);
        $("#uselectKecamatan option").remove();

    }else{
        $("#uselectKecamatan").prop('disabled', true);
        $('#uselectKecamatan').append($('<option>', {value:'', text:'Pilih Kecamatan'}, '</option>'));

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
                $('#uselectKecamatan').append($('<option>', {value:data['id'], text:data['name']}, '</option>'));
           })
          }

      });
    });

    $('select#uselectKecamatan').on('change', function (e) {
    let optionSelected = $("option:selected", this);
    let valueSelected = this.value;

    console.log(valueSelected)
    if(valueSelected != 0){
        $("#uselectKelurahanDesa").prop('disabled', false);
        $("#uselectKelurahanDesa option").remove();

    }else{
        $("#uselectKelurahanDesa").prop('disabled', true);
        $('#uselectKelurahanDesa').append($('<option>', {value:'', text:'Pilih Kelurahan/Desa'}, '</option>'));

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
                $('#uselectKelurahanDesa').append($('<option>', {value:data['id'], text:data['name']}, '</option>'));
           })
          }

      });
    });
    $("button#ubahAlamats").click(function () {
            var uid = $(this).data('id');

            var unama_penerima = $(this).data('unama_penerima');
            var unohp_penerima = $(this).data('unohp_penerima');
            var ualamat = $(this).data('ualamat');

            
            $('#uid').val(uid);
            $('#unama_penerima').val(unama_penerima);
            $('#unohp_penerima').val(unohp_penerima);
            $('#ualamat').val(ualamat);


        });
  
});
</script>
    
@endsection