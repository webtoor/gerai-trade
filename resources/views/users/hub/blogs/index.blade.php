@extends('users.default')

@section('content')


<div class="single-product-slider" >

    <div class="container-fluid">

    <div class="row">
    @include('users.partials.sidebar')



    <div class="col-sm-10" style="margin-top:30px;">
            <div class="text-center">
                    <b>Cerita</b>
                    <h4 class="c-blue-900"><b>Cerita Saya</b></h4>
                </div>
    <div class="bgc-white p-10 bd">
        
    @include('users.partials.messages') 

    <a href="{{route('home.tambah-cerita')}}" class="btn btn-primary btn-md" title="{{ trans('Tambah Cerita') }}"><b><i class="fa fa-plus"></i> Tambah Cerita</b></a>
    <div class="mT-30">
        <table id="dataTable" class="table table-bordered" cellspacing="0" width="100%">
            <thead class="thead-light">
                <tr>
                    <th width="150px">Judul</th>
                    <th>Tanggal Pembuatan</th>
                    <th class="text-center">Status</th>
                    <th width="170px">Action</th>
                </tr>
            </thead>
            <tbody>
                   @foreach($blog as $blogs)
              
                <tr>
                    <td>{{$blogs->judul}}</td>
                    
                  
                    <td>{{ date("j-M-Y, H:i", strtotime($blogs->created_at))}}</td>
                    <td>
                        @if($blogs->status == '1')
                        <div class="text-center">
                                <button style="padding:8px;" class="btn btn-success btn-sm">
                                        <i class="fas fa-check-square fa-2x"></i>
                                        <b>Aktif</b>
                                </button>
                        </div>

                        
                        @else
                        <div class="text-center">

                        <button id="showKomCerita" data-toggle="modal" data-target="#showsKomCerita" title="{{ trans('Lihat Komentar') }}" style="padding:5px;" class="btn btn-danger btn-sm"
                        data-judul="{{$blogs->judul}}" data-komentar="{{$blogs->komentar}}">
                                <i class="fas fa-exclamation-triangle fa-2x"></i>  
                                <b>Belum Aktif</b>
                        </button>
                        </div>

                        @endif
                    </td>
                    <td>
                            <ul class="list-inline">
                                   {{--  <li class="list-inline-item">
                                            <button  id="showModalCerita" data-toggle="modal" data-target="#showCerita" title="{{ trans('Lihat Detail') }}" class="btn btn-dark px-3 btn-sm"
                                            data-juduls="{{$blogs->judul}}" data-kontens="{{$blogs->konten}}">
                                                <span class="ti-zoom-in"></span>
                                        </button>
                                        </li> --}}
                                    <li class="list-inline-item">
                                        <a  href="{{route('home.edit-cerita', ['cerita_id' => $blogs->id])}}" title="{{ trans('Edit Cerita') }}" class="btn btn-info px-3 btn-sm">
                                            <span class="ti-pencil"></span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                            {!! Form::open([
                                                'class'=>'delete',
                                                'url'  => route('home.delete-cerita', $blogs->id), 
                                                'method' => 'DELETE',
                                                ]) 
                                            !!}
                                                <button class="btn btn-danger px-3 btn-sm" title="{{ trans('Hapus Cerita') }}"><i class="ti-trash"></i></button>
                                                
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
<!-- Modal -->
<div class="modal fade" id="showsKomCerita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detail Status</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div style="padding-bottom:5px;">
                 Judul Cerita : <b id="dataJudul"></b>
            </div>
            <div style="padding-bottom:5px;">
                 Status : Menunggu Verifikasi
                </div>
              <div>
                  Komentar : <b id="dataKomentar"></b>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
<footer class="ftco-footer ftco-section" style="background-color:#f8f9fa; margin-top:100px;">
    @include('users.partials.footer');
</footer> 


@endsection
@section('js')
<script>
$(document).ready(function() {



$("button#showKomCerita").click(function () {
            var judul =  $(this).data('judul');
            var komentar =  $(this).data('komentar');

            $('#dataJudul').html(judul);
            if(komentar != ''){
                $('#dataKomentar').html(komentar);
            }else{
                $('#dataKomentar').html('-');

            }

            console.log(judul + komentar)
        });

});

</script>
@endsection