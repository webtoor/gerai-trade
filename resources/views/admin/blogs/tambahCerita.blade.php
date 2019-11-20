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
    <b>Blogs</b>
    <h4 class="c-blue-900"><b>Tambah Cerita</b></h4>
</div>
<div class="bgc-white p-20 bd">
  <form action=" {!! action('AdminBlogController@insert') !!}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}

   
                <div class="form-group">
                  <label>Judul Cerita <sup style="color:red"> *Wajib</sup></label>
                  <input type="text" class="form-control" name="judul" id="judul" aria-describedby="emailHelp" placeholder="Masukan Judul Cerita" required>
                </div>
                <div class="form-group">
                        <label>Konten <sup style="color:red"> *Wajib *Hanya Karakter/String</sup> </label>
                       <textarea  id="konten" name="konten" class="form-control" required></textarea>
                </div>
                    <div class="form-group">
                          <label>Pilih Banner Foto<sup style="color:red"> *Wajib </sup></label>
                          <input type="file" class="form-control" name="image" id="file-input" required/>                            
                        </div>
                <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                <button type="submit" id="submit" class="btn btn-primary">Submit</button>

                </form>
</div>
@endsection
