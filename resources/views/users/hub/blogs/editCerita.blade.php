@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">  

@endsection
@extends('users.default')

@section('content')


<div class="single-product-slider" >

    <div class="container-fluid">

    <div class="row">
    @include('users.partials.sidebar')



    <div class="col-sm-10" style="margin-top:30px;">
            @include('users.partials.messages') 
            <div class="row gap-20 masonry pos-r">
                    <div class="masonry-sizer col-md-6"></div>
                    <div class="masonry-item col-md-6">
                <div class="bgc-white p-20 bd">

                        {!! Form::open([
                            'url'  => route('admin-panel.update-blog', $blog->id), 
                            'method' => 'PUT',
                            ]) !!} 

                                <div class="form-group">
                                  <label>Judul Cerita <sup style="color:red"> *Wajib</sup></label>
                                <input type="text" class="form-control" name="judul" id="judul" aria-describedby="emailHelp" value="{{$blog->judul}}" required>
                                </div>
                                <div class="form-group">
                                        <label>Konten <sup style="color:red"> *Wajib *Hanya Karakter/String</sup> </label>
                                       <textarea  id="konten" name="konten" class="form-control" required> {{$blog->konten}}</textarea>
                                </div>
                    
                                <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                
                                {!! Form::close() !!}
                            </div>
                        </div>

                        
                        <div class="masonry-item col-md-6">
                        <div class="bgc-white p-20 bd">
                                <label>Foto Banner</label>
                
                            <div style="width:100%; height:300px;"> 
                               <img src="{{ asset('storage/' .$blog->image)}}" style="height:300px; width: 100%;">
                            </div>
                            <div class="text-center">
                                    <button class="btn btn-md btn-outline-secondary" id="replacesImage" data-blog_id="{{$blog->id}}" data-toggle="modal" data-target="#replaceImage" title="{{ trans('Ganti Foto Banner') }}">Ganti Foto</button>
                
                            </div>
                            </div>
                        </div>
                           
            </div>
    </div>
</div>
</div>
</div>
                       

<footer class="ftco-footer ftco-section" style="background-color:#f8f9fa; margin-top:100px;">
    @include('users.partials.footer');
</footer> 


@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>    
<script>
$(document).ready(function() {

$('#konten').summernote({
height: 200
});

});
</script>
@endsection