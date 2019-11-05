@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">  
<style>
        .thumb{
            margin: 10px 5px 0 0;
            width: 300px;
        } 
        </style>
 @endsection
@extends('admin.default')

@section('content')
<div class="text-center">
    <b>Produk</b>
    <h4 class="c-blue-900"><b>Edit Produk</b></h4>
</div>
<br>
<div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item col-md-6">
<div class="bgc-white p-20 bd">
  <form action=" #" method="POST" enctype="multipart/form-data">
    {!! Form::open([
        'url'  => route('admin-panel.update-produk', $produk->id), 
        'method' => 'PUT',
        ]) !!}  

    <div class="form-group">
            <label>Mitra <sup style="color:red"> *Wajib</sup></label>
            <select class="form-control" name="mitra_id" id="mitra_id" required>
                @foreach ($mitra as $mitraes)
                @if(($mitraes->user->id) == ($produk->user_id))
                <option value="{{$mitraes->user->id}}" selected="selected">{{$mitraes->user->nama_depan}} {{$mitraes->user->nama_belakang}}</option>
                @else
                <option value="{{$mitraes->user->id}}">{{$mitraes->user->nama_depan}} {{$mitraes->user->nama_belakang}}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
                <label>Kategori <sup style="color:red"> *Wajib</sup></label>
                <select id="kategori" class="form-control" name="kategori_id" id="kategori_id" required>
                    @foreach ($kategori as $kategories)
                    @if(($kategories->id) == ($produk->kategori_id))
                    <option value="{{$kategories->id}}" selected="selected">{{$kategories->kategori_name}}</option>
                    @else
                    <option value="{{$kategories->id}}">{{$kategories->kategori_name}}</option>
                    @endif
                    @endforeach
             
                </select>
                </div>
                <div class="form-group">
                        <label>SubKategori</label>
                        <select class="form-control" name="subkategori_id" id="subkategori">
                            @foreach($subkategori as $subkategories)
                            @if(($subkategories->id) == ($produk->subkategori_id))
                            <option value="{{$subkategories->id}}" selected="selected">{{$subkategories->subkategori_name}}</option>
                            @else
                            <option value="{{$subkategories->id}}">{{$subkategories->subkategori_name}}</option>
                            @endif
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                  <label>Nama Produk <sup style="color:red"> *Wajib</sup></label>
                <input type="text" class="form-control" name="nama_produk" id="nama_produk" aria-describedby="emailHelp" value="{{$produk->nama_produk}}" required>
                </div>
                <div class="form-group">
                        <label>Deskripsi Produk <sup style="color:red"> *Wajib *Hanya Karakter/String</sup> </label>
                <textarea  id="deskripsi" name="deskripsi" class="form-control">{{$produk->deskripsi}}</textarea>
                </div>
                <div class="form-group">
                        <label>Stok Produk <sup style="color:red"> *Wajib *Hanya Angka</sup></label> 
                        <input type="number" class="form-control" name="stok" id="stok_produk" aria-describedby="emailHelp" value="{{$produk->stok}}" required>
                    </div>
                 <div class="form-group">
                        <label>Harga Produk<sup style="color:red"> *Wajib *Hanya Angka</sup></label>
                        <input type="number" class="form-control" name="harga" id="harga_produk" aria-describedby="emailHelp" value="{{$produk->harga}}" required>
                    </div>

                <div class="form-group">
                        <label>Link Tokopedia</label>
                        <input type="text" class="form-control" name="link_tokped" aria-describedby="emailHelp" value="{{$produk->link_tokped}}">
                      </div>
                <div class="form-group">
                    <label>Link Shopee</label>
                    <input type="text" class="form-control" name="link_shopee" aria-describedby="emailHelp" value="{{$produk->link_shopee}}">
                </div>

                <div class="form-group">
                        <label>Link BukaLapak</label>
                        <input type="text" class="form-control" name="link_bukalapak" aria-describedby="emailHelp" value="{{$produk->link_bukalapak}}">
                    </div>

                <button type="submit" id="submit" class="btn btn-primary">Submit</button>

                {!! Form::close() !!}

</div>
</div>
<div class="masonry-item col-md-6">
        <div class="bgc-white p-20 bd">
            @if(count($produk->produk_image) < 3)
            <button data-toggle="modal" data-target="#addSubKategori" class="btn indigo white-text btn-md" title="{{ trans('Tambah Mitra') }}">
                    <b><i class="fa fa-plus"></i> Tambah Foto Produk</b></button>
            @endif
              
                <div class="mT-30">
                        <table class="table table-bordered" cellspacing="0" width="100%">
                            <thead class="indigo white-text">
                                <tr>
                                    <th style="width: 150px;">Foto Produk</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produk->produk_image as $item)
                                    
                                <tr>
                                <td><img src="{{ asset('storage/' .$item->image_path)}}" style="height:150px; width: 150px;"></td>
                                <td>
                                    <ul>
                                        <li class="list-inline-item">
                                                {!! Form::open([
                                                  'class'=>'delete',
                                                  'url'  => route('admin-panel.delete-image', $item->id), 
                                                  'method' => 'DELETE',
                                                  ]) 
                                              !!} 
                                            <button class="btn btn-link btn-lg" title="{{ trans('Hapus Foto') }}"><i class="ti-trash"></i> Hapus Foto</button>
                                                  
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

@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>    
<script>
$(document).ready(function() {

$('#deskripsi').summernote({
height: 200
});
    $('select#kategori').on('change', function (e) {
    let optionSelected = $("option:selected", this);
    let valueSelected = this.value;

    //console.log(valueSelected)
    if(valueSelected != ''){
        $("#subkategori").prop('disabled', false);
        $("#subkategori option").remove();

    }else{
        $("#subkategori").empty();
        $("#subkategori").prop('disabled', true);
        $('#subkategori').append($('<option>', {value:'', text:'Belum Ada SubKategori'}, '</option>'));

    }

    $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        contentType: "application/json",
        dataType: "json",
        type: 'GET',
        url: "../get-subkategori/" + valueSelected,
        success: function (results) {
          console.log(results);
          if(results['data'].length > 0){
          $.each(results['data'], function(index, data) {
                $('#subkategori').append($('<option>', {value:data['id'], text:data['subkategori_name']}, '</option>'));
           })
           }else{
            $("#subkategori").empty();
            $("#subkategori").prop('disabled', true);
            $('#subkategori').append($('<option>', {value:'', text:'Belum Ada SubKategori'}, '</option>'));
           }
          }

      });
    });
});
    </script>
@endsection
