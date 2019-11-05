@extends('admin.default')

@section('content')
<div class="text-center">
    <b>Produk</b>
    <h4 class="c-blue-900"><b>List Produk</b></h4>
</div>
<div class="bgc-white p-20 bd">
    <a href="{{route('admin-panel.add-produk')}}" class="btn btn-primary btn-md" title="{{ trans('Tambah Produk') }}"><b><i class="fa fa-plus"></i> Tambah Produk</b></a>
    <div class="mT-30">
        <table id="dataTable" class="table table-bordered" cellspacing="0" width="100%">
            <thead class="thead-light">
                <tr>
                    <th width="150px">Foto Produk</th>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($produk as $produks)
                   
              
                <tr>
                    <td> 
                        <img src="{{ asset('storage/' .$produks->produk_image[0]->image_path)}}" style="height:150px">
                    </td>
                    <td>{{$produks->nama_produk}}</td>
                    <td>{{$produks->stok}}</td>
                    <td>Rp {{number_format($produks->harga,0, ".", ".")}}</td>
                    <td>
                            <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="{{route('admin-panel.edit-produk', ['produk_id' => $produks->id])}}" title="{{ trans('Edit Produk') }}" class="btn btn-dark px-3 btn-sm">
                                            <span class="ti-pencil"></span>
                                        </a>
                                    </li>
                            </ul>
                      
                    </td>
                  
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
