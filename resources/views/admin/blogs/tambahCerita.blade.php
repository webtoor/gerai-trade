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
                        <label>SubKategori</label>
                        <select class="form-control" name="subkategori_id" id="subkategori" disabled>
                                <option value="">Pilih SubKategori</option>
                        </select>
                </div>
                <div class="form-group">
                  <label>Nama Produk <sup style="color:red"> *Wajib</sup></label>
                  <input type="text" class="form-control" name="nama_produk" id="nama_produk" aria-describedby="emailHelp" placeholder="Masukan Nama Produk" required>
                </div>
                <div class="form-group">
                        <label>Deskripsi Produk <sup style="color:red"> *Wajib *Hanya Karakter/String</sup> </label>
                       <textarea  id="deskripsi" name="deskripsi" class="form-control" ></textarea>
                </div>
                <div class="form-group">
                        <label>Stok Produk <sup style="color:red"> *Wajib *Hanya Angka</sup></label> 
                        <input type="number" class="form-control" name="stok" id="stok_produk" aria-describedby="emailHelp" placeholder="Masukan Stok Produk" required>
                    </div>
                 <div class="form-group">
                        <label>Harga Produk<sup style="color:red"> *Wajib *Hanya Angka</sup></label>
                        <input type="number" class="form-control" name="harga" id="harga_produk" aria-describedby="emailHelp" placeholder="Masukan Harga Produk" required>
                    </div>
                    <div class="form-group">
                          <label>Pilih Foto Produk<sup style="color:red"> *Wajib *Maksimal 3</sup></label>
                          <input type="file" class="form-control" name="image_produk[]" id="file-input" multiple required/>   
                          <div id="thumb-output"></div>
                         
                        </div>

                <div class="form-group">
                        <label>Link Tokopedia</label>
                        <input type="text" class="form-control" name="link_tokped" aria-describedby="emailHelp" placeholder="Masukan Link Produk di Tokopedia">
                      </div>
                <div class="form-group">
                    <label>Link Shopee</label>
                    <input type="text" class="form-control" name="link_shopee" aria-describedby="emailHelp" placeholder="Masukan Link Produk di Shopee">
                </div>

                <div class="form-group">
                        <label>Link BukaLapak</label>
                        <input type="text" class="form-control" name="link_bukalapak" aria-describedby="emailHelp" placeholder="Masukan Link Produk di Bukalapak">
                    </div>

                <button type="submit" id="submit" class="btn btn-primary">Submit</button>

                </form>
</div>
@endsection
