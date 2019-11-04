@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">    @endsection
@extends('admin.default')

@section('content')
<div class="text-center">
    <b>Produk</b>
    <h4 class="c-blue-900"><b>Tambah Produk</b></h4>
</div>
<div class="bgc-white p-20 bd">
<form>
    <div class="form-group">
            <label>Mitra</label>
            <select class="form-control" name="mitra_id" id="">
                <option value="">Pilih Mitra</option>
                @foreach ($mitra as $mitraes)
            <option value="{{$mitraes->user->id}}">{{$mitraes->user->nama_depan}} {{$mitraes->user->nama_belakang}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
                <label>Kategori</label>
                <select id="kategori" class="form-control" name="kategori_id" id="">
                <option value="">Pilih Kategori</option>
                @foreach ($kategori as $kategories)
                    <option value="{{$kategories->id}}">{{$kategories->kategori_name}}</option>
                @endforeach
                </select>
                </div>
                <div class="form-group">
                        <label>SubKategori</label>
                        <select class="form-control" name="subkategori_id" id="subkategori">
                                <option value="">Pilih SubKategori</option>
                        </select>
                </div>
                <div class="form-group">
                  <label>Nama Produk</label>
                  <input type="text" class="form-control" name="nama_produk" id="nama_produk" aria-describedby="emailHelp" placeholder="Masukan Nama Produk">
                </div>
                <div class="form-group">
                        <label>Deskripsi</label>
                       <textarea  id="deskripsi" name="deskripsi" class="form-control"></textarea>
                </div>
                <div class="form-group">
                        <label>Stok</label>
                        <input type="text" class="form-control" name="stok_produk" id="stok_produk" aria-describedby="emailHelp" placeholder="Masukan Stok Produk">
                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
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

    console.log(valueSelected)
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
        url: "get-subkategori/" + valueSelected,
        success: function (results) {
          console.log(results);
          $.each( results['data'], function(index, data) {
                $('#subkategori').append($('<option>', {value:data['id'], text:data['subkategori_name']}, '</option>'));
           })
          }

      });
    });

});
            </script>


@endsection