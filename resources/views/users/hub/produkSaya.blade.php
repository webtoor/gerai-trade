@extends('users.default')

@section('content')


<div class="single-product-slider" >

    <div class="container-fluid">

    <div class="row">
    @include('users.partials.sidebar')



    <div class="col-sm-10" style="margin-top:30px;">
            <div class="text-center">
                    <b>Produk</b>
                    <h4 class="c-blue-900"><b>Produk Saya</b></h4>
                </div>
    <div class="bgc-white p-10 bd">
       
    @include('users.partials.messages') 

    <a href="{{route('home.tambah-produk')}}" class="btn btn-dark btn-md" title="{{ trans('Tambah Produk') }}"><b><i class="fa fa-plus"></i> Tambah Produk</b></a>
    <div class="mT-30">

    <table id="dataTable" class="table" width="100%">
    <thead class="thead-light">
            <tr>
                <th width="150px">Foto Produk</th>
                <th width="200px">Nama Produk</th>
                <th>Stok</th>
                <th>Harga Dasar</th>
                <th class="text-center">Status</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($produk as $produks)
                    
               
                 <tr>
                     <td> 
                         @if(count($produks->produk_image))
                         <img src="{{ asset('storage/' .$produks->produk_image[0]->image_path)}}" style="height:150px; width: 150px;">
                         @else
                         <img src="http://placehold.it/150x150" style="height:150px; width: 150px;"> 
                         @endif
                        {{--  <img src="{{ asset('storage/' .$produks->produk_image[0]->image_path)}}" style="height:150px; width: 150px;"> --}}
                     </td>
                     <td>{{$produks->nama_produk}}</td>
                     <td>{{$produks->stok}}</td>
                     <td>Rp {{number_format($produks->harga_dasar,0, ".", ".")}}</td>
                     <td>
                            @if($produks->status == '1')
                            <div class="text-center">
                                    <button style="padding:8px;" class="btn btn-success btn-sm">
                                            <i class="fas fa-check-square fa-2x"></i>
                                            <b>Aktif</b>
                                    </button>
                            </div>
    
                            
                            @else
                            <div class="text-center">
    
                            <button id="showKomProduk" data-toggle="modal" data-target="#showsKomProduk" title="{{ trans('Lihat Komentar') }}" style="padding:5px;" class="btn btn-danger btn-sm"
                            data-judul="{{$produks->nama_produk}}" data-komentar="{{$produks->komentar}}">
                                    <i class="fas fa-exclamation-triangle fa-2x"></i>  
                                    <b>Belum Aktif</b>
                            </button>
                            </div>
    
                            @endif  
                     </td>
 
                     <td>
                             <ul class="list-inline">
                                     <li class="list-inline-item">
                                         <a href="{{route('home.edit-produk-saya', ['produk_id' => $produks->id])}}" title="{{ trans('Edit Produk') }}" class="btn btn-info px-3 btn-sm">
                                             <span class="ti-pencil"></span>
                                         </a>
                                     </li>
                                     <li class="list-inline-item">
                                             {!! Form::open([
                                                 'class'=>'delete',
                                                 'url'  => route('home.delete-produk-saya', $produks->id), 
                                                 'method' => 'DELETE',
                                                 ]) 
                                             !!}
                                                 <button class="btn btn-danger px-3 btn-sm" title="{{ trans('app.delete_title') }}"><i class="ti-trash"></i></button>
                                                 
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


<!-- Modal -->
<div class="modal fade" id="showsKomProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                 Judul Produk : <b id="dataJudul"></b>
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



$("button#showKomProduk").click(function () {
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