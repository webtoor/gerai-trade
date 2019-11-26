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
            <div class="tab-pane fade show active" id="wishlist" role="tabpanel" aria-labelledby="wishlist-tab">

                    <div class="row" style="margin-top:40px;">
                      <div class="col-sm-12">
                        <button data-toggle="modal" data-target="#addAlamat" class="btn btn-dark btn-md" title="{{ trans('Tambah Alamat') }}">
                          <b><i class="fa fa-plus"></i> Tambah Alamat</b></button>                        <div class="mT-20">
                            <table class="table table-bordered" cellspacing="0" width="100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="150px">Penerima</th>
                                        <th>Alamat Pengiriman</th>
                                        <th>Daerah Pengiriman</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                    <tr>
                                        <td></td>
                                        
                                        <td> </td>
                                        <td></td>
                                        <td></td>
                                        
                                      
                                    </tr>
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
          {!! Form::open([ 'route' => ['admin-panel.add-kategori'], 'method' => "POST"])!!}

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addKategoriLabel">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Nama Penerima</label>
          <input type="text" class="form-control" placeholder="Masukan Nama Penerima">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">No Hp</label>
          <input type="number" class="form-control" placeholder="No Hp">
        </div>
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <textarea type="text" class="form-control" name="nama_alamat" placeholder="Masukan Alamat" required></textarea>
    </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Provinsi</label>
          <select class="form-control" name="provinsi" id="selectProvinsi" required>
            <option selected value="0">Pilih Provinsi</option>
            @foreach ($provinsi as $provinsi_item)
            <option value="{{$provinsi_item->id}}">{{$provinsi_item->name}}</option>
            @endforeach                                                
        </select>
        </div>
        <div class="form-group col-md-6">
          <label>Kota/Kabupaten</label>
          <select class="form-control" name="kota_kabupaten" id="selectKotaKab" required disabled="disabled">
            <option selected value="0">Pilih Kota/Kabupaten</option>
      
        </select>       
       </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Kecamatan</label>
          <select class="form-control" name="kecamatan" id="selectKecamatan" required disabled="disabled">
            <option selected value="0">Pilih Kecamatan</option>
      
        </select>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Kelurahan/Desa</label>
          <select class="form-control" name="kelurahan_desa" id="selectKelurahanDesa" required disabled="disabled">
            <option selected value="0">Pilih Kelurahan/ Desa</option>
        
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
  
});
</script>
    
@endsection