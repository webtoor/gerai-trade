@extends('admin.default')

@section('content')
<div class="text-center">
    <b>User</b>
    <h4 class="c-blue-900"><b>Data Member</b></h4>
</div>
<div class="bgc-white p-20 bd">
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
                @foreach ($member as $members)
                <tr>
                    <td>{{$members->user->nama_depan}} {{$members->user->nama_belakang}}</td>
                    <td>{{$members->user->email}}</td>
                    <td>{{$members->user->nomor_ponsel}}</td>
                    <td>{{ date("j M Y", strtotime($members->user->created_at))}}</td>
                    <td>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <button id="showModalMember" data-toggle="modal" data-target="#showMember" title="{{ trans('Lihat Detail') }}" class="btn btn-dark px-3 btn-sm"
                            data-nama="{{$members->user->nama_depan}} {{$members->user->nama_belakang}}" data-alamat="{{$members->alamat['alamat']}}" data-provinsi="{{$members->alamat['province_name']}}" data-city="{{$members->alamat['city_name']}}" data-kecamatan="{{$members->alamat['kecamatan_name']}}"
                            data-kodeposs="{{$members->alamat['kodepos']}}"
                            >
                                    <span class="ti-zoom-in"></span>
                            </button>
                            </li>
                            <li class="list-inline-item">
                                {!! Form::open([
                                    'class'=>'delete',
                                    'url'  => route('admin-panel.deleteMember', $members->user->id), 
                                    'method' => 'DELETE',
                                    ]) 
                                !!}
                                    <button class="btn btn-danger px-3 btn-sm" title="{{ trans('Hapus Member') }}"><i class="ti-trash"></i></button>
                                    
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


<div class="modal fade" id="showMember" tabindex="-1" role="dialog" aria-labelledby="showMemberLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="showMemberLabel">Detail Member</h5>
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

@endsection
@section('js')
<script>
$(document).ready(function () {


    $("#dataTable" ).on( "click","button#showModalMember", function() {
            var alamat = $(this).data('alamat');
            var provinsi = $(this).data('provinsi');
            var city = $(this).data('city');
            var kecamatan = $(this).data('kecamatan');
            var kodeposs = $(this).data('kodeposs')

            if(alamat){
                $('#alamat').html('Alamat : '+ alamat);
                $('#provinsi').html('Provinsi : '+ provinsi);
                $('#kota_kabs').html('Kota/Kabupaten : ' + city);
                $('#kecamatans').html('Kecamatan : ' + kecamatan);
                $('#kodeposs').html('Kode Pos : ' + kodeposs);
            }else{
                $('#alamat').html('Belum ada informasi detail');
                $('#provinsi').html('');
                $('#kota_kabs').html('');
                $('#kecamatans').html('');
                $('#kodeposs').html('');
            }
         
           
        });
});
</script>

@endsection
