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
<div class="bgc-white p-20 bd">
  <form action=" #" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}

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
                            @if($subkategori)
                            <option value="{{$subkategori->id}}" selected="selected">{{$subkategori->subkategori_name}}</option>
                            @else
                            <option value="" selected="selected">Belum Ada SubKategori</option>
                            @endif
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

                </form>
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
