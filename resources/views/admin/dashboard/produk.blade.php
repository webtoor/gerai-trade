@extends('admin.default')

@section('content')
<div class="text-center">
    <b>Produk</b>
    <h4 class="c-blue-900"><b>List Produk</b></h4>
</div>
<div class="bgc-white p-20 bd">
    <a href="#" class="btn btn-primary btn-md" title="{{ trans('Tambah Mitra') }}"><b><i class="fa fa-plus"></i> Tambah Produk</b></a>
    <div class="mT-30">
        <table id="dataTable" class="table table-bordered" cellspacing="0" width="100%">
            <thead class="thead-light">
                <tr>
                    <th>Foto Produk</th>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      
                    </td>
                  
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection

