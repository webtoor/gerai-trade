@extends('users.default')

@section('content')


<div class="single-product-slider" >

    <div class="container-fluid">

    <div class="row">
    @include('users.partials.sidebar')



    <div class="col-sm-10" style="margin-top:30px;">
    <div class="bgc-white p-10 bd">
    @include('users.partials.messages') 

    <a href="{{route('home.tambah-cerita')}}" class="btn btn-primary btn-md" title="{{ trans('Tambah Cerita') }}"><b><i class="fa fa-plus"></i> Tambah Cerita</b></a>
    <div class="mT-30">
        <table id="dataTable" class="table table-bordered" cellspacing="0" width="100%">
            <thead class="thead-light">
                <tr>
                    <th width="150px">Judul</th>
                    <th>Tanggal Pembuatan</th>
                    <th>Status</th>
                    <th width="170px">Action</th>
                </tr>
            </thead>
            <tbody>
                   @foreach($blog as $blogs)
              
                <tr>
                    <td>{{$blogs->judul}}</td>
                    
                   {{--  <td> {!! \Illuminate\Support\Str::limit(html_entity_decode($blogs->konten),100) !!}</td> --}}
                    <
                    <td>{{ date("j-M-Y, H:i", strtotime($blogs->created_at))}}</td>
                    <td>
                        @if($blogs->status)
                        Aktif
                        @else
                        Non-Aktif
                        @endif
                    </td>
                    <td>
                            <ul class="list-inline">
                                    <li class="list-inline-item">
                                            <button style="border-radius:45%;"  id="showModalCerita" data-toggle="modal" data-target="#showCerita" title="{{ trans('Lihat Detail') }}" class="btn btn-dark px-3 btn-sm"
                                            data-juduls="{{$blogs->judul}}" data-kontens="{{$blogs->konten}}">
                                                <span class="ti-zoom-in"></span>
                                        </button>
                                        </li>
                                    <li class="list-inline-item">
                                        <a style="border-radius:45%;" href="{{route('admin-panel.edit-blog', ['blog_id' => $blogs->id])}}" title="{{ trans('Edit Cerita') }}" class="btn btn-info px-3 btn-sm">
                                            <span class="ti-pencil"></span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                            {!! Form::open([
                                                'class'=>'delete',
                                                'url'  => route('admin-panel.delete-blog', $blogs->id), 
                                                'method' => 'DELETE',
                                                ]) 
                                            !!}
                                                <button class="btn btn-danger px-3 btn-sm" title="{{ trans('Hapus Cerita') }}" style="border-radius:45%;"><i class="ti-trash"></i></button>
                                                
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
    </div>
    </div>
    </div>

</div>
<footer class="ftco-footer ftco-section" style="background-color:#f8f9fa; margin-top:100px;">
    @include('users.partials.footer');
</footer> 


@endsection
