@extends('admin.default')

@section('content')
<div class="text-center">
    <b>Cerita</b>
    <h4 class="c-blue-900"><b>Kelola Cerita</b></h4>
</div>
<div class="bgc-white p-20 bd">
    <a href="{{route('admin-panel.add-blog')}}" class="btn btn-primary btn-md" title="{{ trans('Tambah Cerita') }}"><b><i class="fa fa-plus"></i> Cerita Baru</b></a>
    <div class="mT-30">
        <table id="dataTable" class="table table-bordered" cellspacing="0" width="100%">
            <thead class="thead-light">
                <tr>
                    <th width="150px">Judul</th>
                    <th>Cerita</th>
                    <th>Pembuat</th>
                    <th>Tanggal Pembuatan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                   @foreach($blog as $blogs)
              
                <tr>
                    <td>{{$blogs->judul}}</td>
                    <td>{!! html_entity_decode($blogs->konten) !!}</td>
                    <td>{{$blogs->user->nama_depan}}</td>
                    <td>{{ date("j-M-Y, H:i", strtotime($blogs->created_at))}}</td>
                    <td>
                            <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="{{route('admin-panel.edit-blog', ['blog_id' => $blogs->id])}}" title="{{ trans('Edit Produk') }}" class="btn btn-dark px-3 btn-sm">
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
                                                <button class="btn btn-danger px-3 btn-sm" title="{{ trans('app.delete_title') }}"><i class="ti-trash"></i></button>
                                                
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
@endsection

