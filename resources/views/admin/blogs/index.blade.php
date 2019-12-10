@extends('admin.default')

@section('content')
<div class="text-center">
    <b>Cerita</b>
    <h4 class="c-blue-900"><b>Kelola Cerita</b></h4>
</div>
<div class="bgc-white p-20 bd">
    <a href="{{route('admin-panel.add-blog')}}" class="btn btn-primary btn-md" title="{{ trans('Tambah Cerita') }}"><b><i class="fa fa-plus"></i> Cerita Baru</b></a>
    <div class="mT-30">
        <table id="dataTable" class="table table-bordered" cellspacing="0" width="100%">
            <thead class="thead-light">
                <tr>
                    <th width="150px">Judul</th>
                    <th>Pembuat</th>
                    <th>Tanggal Pembuatan</th>
                    <th>Status</th>
                    <th width="170px">Action</th>
                </tr>
            </thead>
            <tbody>
                   @foreach($blog as $blogs)
              
                <tr>
                    <td>{{$blogs->judul}}</td>
                    
                   {{--  <td> {!! \Illuminate\Support\Str::limit(html_entity_decode($blogs->konten),100) !!}</td> --}}
                    <td>
                        @if($blogs->user->nama_hub)
                        {{$blogs->user->nama_hub}}
                        @else
                        Admin
                        @endif
                    </td>
                    <td>{{ date("j-M-Y, H:i", strtotime($blogs->created_at))}}</td>
                    <td>
                        @if($blogs->status)
                        Aktif
                        @else
                        Belum Aktif
                        @endif
                    </td>
                    <td>
                            <ul class="list-inline">
                                    <li class="list-inline-item">
                                            <button style="border-radius:45%;"  id="showModalCerita" data-toggle="modal" data-target="#showCerita" title="{{ trans('Lihat Detail') }}" class="btn btn-dark px-3 btn-sm"
                                            data-juduls="{{$blogs->judul}}" data-kontens="{{$blogs->konten}}">
                                                <span class="ti-zoom-in"></span>
                                        </button>
                                        </li>
                                    <li class="list-inline-item">
                                        <a style="border-radius:45%;" href="{{route('admin-panel.edit-blog', ['blog_id' => $blogs->id])}}" title="{{ trans('Edit Cerita') }}" class="btn btn-info px-3 btn-sm">
                                            <span class="ti-pencil"></span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                            {!! Form::open([
                                                'class'=>'delete',
                                                'url'  => route('admin-panel.delete-blog', $blogs->id), 
                                                'method' => 'DELETE',
                                                ]) 
                                            !!}
                                                <button class="btn btn-danger px-3 btn-sm" title="{{ trans('Hapus Cerita') }}" style="border-radius:45%;"><i class="ti-trash"></i></button>
                                                
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
            <div class="modal-body text-center">
        
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
    $("button#showModalCerita").click(function () {
            var juduls = $(this).data('juduls');
            var kontens = $(this).data('kontens');

            $('#showCeritaLabel').html(juduls);
            $('.modal-body').html(kontens);


        });
});
</script>
    
@endsection
