@extends('users.default')

@section('content')


<div class="single-product-slider">

    <div class="container-fluid">

    <div class="row">
    @include('users.partials.sidebar')



    <div class="col-sm-10" style="margin-top:30px;">
    <div class="bgc-white p-10 bd">

    <a href="#" class="btn btn-info btn-md" title="{{ trans('Tambah Produk') }}"><b><i class="fa fa-plus"></i> Cerita Baru</b></a>
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
    </table>
    </div>


    </div>

    </div>
    </div>
    </div>
    </div>

</div>
<footer class="ftco-footer ftco-section" style="background-color:#f8f9fa">
    @include('users.partials.footer');
</footer> 


@endsection
