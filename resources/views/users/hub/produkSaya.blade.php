@extends('users.default')

@section('content')


<div class="single-product-slider" >

    <div class="container-fluid">

    <div class="row">
    @include('users.partials.sidebar')



    <div class="col-sm-10" style="margin-top:30px;">
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
                <th>Status</th>
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
                     @if($produks->status)
                     Aktif
                     @else
                     Belum Aktif
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

</div>
<footer class="ftco-footer ftco-section" style="background-color:#f8f9fa; margin-top:100px;">
    @include('users.partials.footer');
</footer> 


@endsection
