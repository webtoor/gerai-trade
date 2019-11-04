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
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>    <script>
            $(document).ready(function() {
            
            $('#deskripsi').summernote({
                height: 200
            
            });
            
            });
            </script>


@endsection