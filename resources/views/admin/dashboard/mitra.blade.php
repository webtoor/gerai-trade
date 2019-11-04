@extends('admin.default')

@section('content')
<div class="text-center">
    <b>User</b>
    <h4 class="c-blue-900"><b>Data Mitra</b></h4>
</div>
<div class="bgc-white p-20 bd">
    <button data-toggle="modal" data-target="#addMitra" class="btn btn-primary btn-md" title="{{ trans('Tambah Mitra') }}">
        <b><i class="fa fa-plus"></i> Tambah Mitra</b></button>
    <div class="mT-30">
        <table id="dataTable" class="table table-bordered" cellspacing="0" width="100%">
            <thead class="thead-light">
                <tr>
                    <th>Nama</th>
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
                    <td>{{$mitras->user->nama_depan}} {{$mitras->user->nama_belakang}}</td>
                    <td>{{$mitras->user->email}}</td>
                    <td>{{$mitras->user->nomor_ponsel}}</td>
                    <td>{{ date("j M Y", strtotime($mitras->user->updated_at))}}</td>
                    <td>
                        <ul class="list-inline">
                                <li class="list-inline-item">
                                    <button id="showModalMitra" data-toggle="modal" data-target="#showMitra" title="{{ trans('Lihat Detail') }}" class="btn btn-dark px-3 btn-sm"
                                data-nama="{{$mitras->user->nama_depan}} {{$mitras->user->nama_belakang}}" data-alamat="{{$mitras->alamat['alamat']}}" data-provinsi="{{$mitras->alamat['provinsi']['name']}}"
                                data-kota_kabs="{{$mitras->alamat['kota_kabupatens']['name']}}" data-kecamatans="{{$mitras->alamat['kecamatans']['name']}}" data-kel_dess="{{$mitras->alamat['kelurahan_desa']['name']}}"
                                >
                                        <span class="ti-zoom-in"></span>
                                </button>
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
              <h5 class="modal-title" id="showMitraLabel">Detail Mitra</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
          <div id="nama"> </div>
          <div id="alamat"> </div>
          <div id="provinsi"> </div>
          <div id="kota_kabs"> </div>
          <div id="kecamatans"> </div>
          <div id="kel_dess"> </div>
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
                {!! Form::open([ 'route' => ['admin-panel.insert-produk'], 'method' => "POST"])!!}
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addMitraLabel">Tambah Mitra</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nama Depan</label>
                        <input type="text" class="form-control" name="nama_depan" placeholder="Masukan Nama depan" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nama Belakang</label>
                        <input type="text" class="form-control" name="nama_belakang" placeholder="Masukan Nama belakang" required>
                    </div>
            </div>
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukan Email" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nomor Ponsel</label>
                        <input type="number" name="nomor_ponsel" class="form-control" placeholder="Masukan Nomor Ponsel" required>
                    </div>
            </div>
            <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat" required>
                    </div>
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
                        <label>Kota atau Kabupaten</label>
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
                    <label>Kelurahan atau Desa</label>
                        <select class="form-control" name="kelurahan_desa" id="selectKelurahanDesa" required disabled="disabled">
                            <option selected value="0">Pilih Kelurahan/Desa</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Ulangi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi Password" required>
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

    $("button#showModalMitra").click(function () {
            var nama = $(this).data('nama');
            var alamat = $(this).data('alamat');
            var provinsi = $(this).data('provinsi');
            var kota_kabs = $(this).data('kota_kabs');
            var kecamatans = $(this).data('kecamatans');
            var kel_dess = $(this).data('kel_dess');

            $('#nama').html('Nama : '+ nama);
            $('#alamat').html('Alamat : '+ alamat);
            $('#provinsi').html('Provinsi : '+ provinsi);
            $('#kota_kabs').html('Kota/Kabupaten : '+ kota_kabs);
            $('#kecamatans').html('Kecamatan : '+ kecamatans);
            $('#kel_dess').html('Kelurahan/Desa : '+ kel_dess);



        });
});
</script>

@endsection
