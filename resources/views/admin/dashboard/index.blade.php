@extends('admin.default')

@section('content')
<div class="masonry-item  w-100">
        <div class="row gap-20">

           <!-- Organization ==================== -->
           <div class='col-md-3'>
              <div class="layers bd bgc-white p-20">
                  <div class="layer w-100 mB-10">
                      <h6 class="lh-1">Jumlah Member</h6>
                  </div>
                  <div class="layer w-100">
                      <div class="peers ai-sb fxw-nw">
                          <div class="peer peer-greed">
                              <span id="sparklinedash4"></span>
                          </div>
                          <div class="peer">
                              <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">
                                  {{$jumlah_member}}
                              </span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
             <!-- Total Admins ==================== -->
             <div class='col-md-3'>
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Jumlah Mitra</h6>
                    </div>
                    <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                            <div class="peer peer-greed">
                                <span id="sparklinedash3"></span>
                            </div>
                            <div class="peer">
                                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">
                                {{$jumlah_mitra}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="bgc-white p-20 bd">
         <h4>Verifikasi Cerita</h4>
            <div class="mT-30">
                <table id="dataTable" class="table table-bordered" cellspacing="0" width="100%">
                    <thead class="thead-light">
                        <tr>
                            <th width="100px">Nama Hub</th>
                            <th width="200px">Foto Banner</th>
                            <th>Judul Cerita</th>
                            <th>Tanggal Pembuatan</th>
                            <th width="130px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($request_blog as $items)
                            
                        <tr>
                        <td>{{$items->user->nama_hub}}</td>
                        <td> @if($items->image)
                                <img src="{{ asset('storage/' .$items->image)}}" style="height:150px; width: 200px;">
                                @else
                                <img src="http://placehold.it/150x150" style="height:150px; width: 200px;"> 
                                @endif
                        </td>
                        <td>{{$items->judul}}</td>
                        <td>{{ date("j-M-Y, H:i", strtotime($items->created_at))}}</td>

                         <td><ul class="list-inline">
                                <li class="list-inline-item">
                                        <button id="showModalCerita" data-toggle="modal" data-target="#showCerita" title="{{ trans('Lihat Detail') }}" class="btn btn-dark px-3 btn-sm"
                                        data-judulx="{{$items->judul}}" data-kontens="{{$items->konten}}">
                                            <span class="ti-zoom-in"></span>
                                    </button>
                                </li>
                                <li class="list-inline-item">
                                <button data-id="{{$items->id}}" id="updateModalStatus" data-toggle="modal" data-target="#updateStatusCerita" title="{{ trans('Verifikasikan') }}" class="btn btn-success px-3 btn-sm">
                                            <span class="fas fa-exclamation-triangle"></span>
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
       

        <!-- SHOW CERITA KITA -->
<div class="modal fade" id="showCerita" tabindex="-1" role="dialog" aria-labelledby="showMitraLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="showCeritaLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="modal-body">
        
          </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

        <div class="modal fade" id="updateStatusCerita" tabindex="-1" role="dialog" aria-labelledby="updateStatusMitraLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
             {!! Form::open([ 'route' => ['admin-panel.verifikasiCerita'], 'method' => "PUT"])!!}

              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="updateStatusMitraLabel">Konfirmasi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <div class="form-group">
                        <label>Apakah Anda setuju untuk menerbitkan cerita ini?<sup style="color:red"> *Wajib</sup></label>
                        <select class="form-control" name="status_id" required>
                            <option value="">Pilih</option>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>

                        </select>
                    </div>

                    <div class="form-group">
                            <label>Komentar </label>
                           <textarea name="komentar" class="form-control" ></textarea>
                    </div>
              </div>
            <div class="modal-footer">
                    <input type="hidden" id="cerita_id" name="cerita_id">
                    <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary btn-md">Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('js')
<script>
$(document).ready(function () {


    $("button#showModalCerita").click(function () {
            var judulx = $(this).data('judulx');
            var kontens = $(this).data('kontens');

            $('#showCeritaLabel').html(judulx);
            $('#modal-body').html(kontens);

        });

    $("button#updateModalStatus").click(function () {
        var cerita_id = $(this).data('id');
        $('#cerita_id').val(cerita_id);

    });
});
</script>

@endsection