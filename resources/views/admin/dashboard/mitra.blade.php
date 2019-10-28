@extends('admin.default')

@section('content')
<div class="text-center">
    <b>User</b>
    <h4 class="c-blue-900"><b>Data Mitra</b></h4>
</div>
<div class="bgc-white p-20 bd">
    <button data-toggle="modal" data-target="#addMitra" class="btn btn-primary btn-md" title="{{ trans('app.add_button') }}">
        <b><i class="fa fa-plus"></i> Tambah Mitra</b></button>
    <div class="mT-30">
        <table id="dataTable" class="table table-bordered" cellspacing="0" width="100%">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor Ponsel</th>
                    <th>Join</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($mitra as $mitras)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$mitras->user->nama_depan}} {{$mitras->user->nama_belakang}}</td>
                    <td>{{$mitras->user->email}}</td>
                    <td>{{$mitras->user->nomor_ponsel}}</td>
                    <td>{{ date("j M Y", strtotime($mitras->user->created_at))}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addMitra" tabindex="-1" role="dialog" aria-labelledby="addMitraLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
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
                        <input type="text" class="form-control" name="username" placeholder="Masukan Nama depan">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nama Belakang</label>
                        <input type="text" class="form-control" id="trainer_firstname" placeholder="Masukan Nama belakang" name="firstname" required>
                    </div>
            </div>
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Masukan Email" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nomor Ponsel</label>
                        <input type="text" class="form-control" placeholder="Masukan Nomor Ponsel" name="nomor_ponsel" required>
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
                            <select class="form-control" name="kota_kabupaten" id="kotaKab" required disabled="disabled">
                                <option selected value="">Pilih Kota/Kabupaten</option>
                            </select>
                    </div>
              
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('js')
<script>
$(document).ready(function () {
    $('select#selectProvinsi').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    console.log(valueSelected)
    if(valueSelected != 0){
        $("#kotaKab").prop('disabled', false);
        $("#kotaKab option").remove();

    }else{
        $("#kotaKab").prop('disabled', true);
        $('#kotaKab').append($('<option>', {value:'0', text:'Pilih Kota/Kabupaten'}, '</option>'));

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
          $.each( results['data'], function(id, name) {
                $('#kotaKab').append($('<option>', {value:id['id'], text:name['name']}, '</option>'));
           })
          }

      });
    });
});
</script>

@endsection
