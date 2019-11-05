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
    <h4 class="c-blue-900"><b>Tambah Produk</b></h4>
</div>
<div class="bgc-white p-20 bd">
  <form action=" {!! action('AdminProdukController@insert') !!}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}

    <div class="form-group">
            <label>Mitra</label>
            <select class="form-control" name="mitra_id" id="mitra_id" required>
                <option value="">Pilih Mitra</option>
                @foreach ($mitra as $mitraes)
            <option value="{{$mitraes->user->id}}">{{$mitraes->user->nama_depan}} {{$mitraes->user->nama_belakang}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
                <label>Kategori</label>
                <select id="kategori" class="form-control" name="kategori_id" id="kategori_id" required>
                <option value="">Pilih Kategori</option>
                @foreach ($kategori as $kategories)
                    <option value="{{$kategories->id}}">{{$kategories->kategori_name}}</option>
                @endforeach
                </select>
                </div>
                <div class="form-group">
                        <label>SubKategori</label>
                        <select class="form-control" name="subkategori_id" id="subkategori" disabled>
                                <option value="">Pilih SubKategori</option>
                        </select>
                </div>
                <div class="form-group">
                  <label>Nama Produk</label>
                  <input type="text" class="form-control" name="nama_produk" id="nama_produk" aria-describedby="emailHelp" placeholder="Masukan Nama Produk" required>
                </div>
                <div class="form-group">
                        <label>Deskripsi Produk <sup style="color:red"> *Hanya Karakter/String</sup></label> </label>
                       <textarea  id="deskripsi" name="deskripsi" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                        <label>Stok Produk <sup style="color:red"> *Hanya Angka</sup></label> 
                        <input type="number" class="form-control" name="stok" id="stok_produk" aria-describedby="emailHelp" placeholder="Masukan Stok Produk" required>
                    </div>
                 <div class="form-group">
                        <label>Harga Produk<sup style="color:red"> *Hanya Angka</sup></label>
                        <input type="number" class="form-control" name="harga" id="harga_produk" aria-describedby="emailHelp" placeholder="Masukan Harga Produk" required>
                    </div>
                <div class="form-group">
                        <label>Pilih Gambar<sup style="color:red"> *Maksimal 3</sup></label>
                        <input type="file" class="form-control" id="file-input" multiple />   
                        <div id="thumb-output"></div>
        
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
        url: "get-subkategori/" + valueSelected,
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
    $('input#file-input').on('change', function(){ 
        if (window.FileReader) //check File API supported browser
        {
            if (this.files.length > 1){
                alert('to many files')
                this.value = ""
                $('#thumb-output').empty()

            }else{

           
            
        var data = $(this)[0].files; //this file data
        $.each(data, function(index, file){ //loop though each file
            if((/(\.|\/)(gif|jpe?g|png)$/i.test(file.type))){ //check supported file type
                var fRead = new FileReader(); //new filereader
                fRead.onload = (function(file){ //trigger function on successful read
                return function(e) {
                    $('#thumb-output').empty()

                    var img = $('<img style="height:200px; width:200px;"/>').addClass('thumb').attr('src', e.target.result); //create image element 
                    $('#thumb-output').append(img); //append image to output element
                };
                })(file);
                fRead.readAsDataURL(file); //URL representing the file's data.
            }
        });
    }
    }
    });
});
</script>


@endsection