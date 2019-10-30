@extends('admin.default')

@section('content')
<div class="text-center">
    <b>kategori</b>
    <h4 class="c-blue-900"><b>Kelola Kategori</b></h4>
</div>
<div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item col-md-6">
<div class="bgc-white p-20 bd">
        <button data-toggle="modal" data-target="#addMitra" class="btn btn-dark btn-md" title="{{ trans('Tambah Mitra') }}">
                <b><i class="fa fa-plus"></i> Tambah Kategori</b></button>
       <div class="mT-30">
           <table id="kelolaKategori" class="table table-bordered" cellspacing="0" width="100%">
               <thead class="thead-light">
                   <tr>
                       <th>Nama Kategori</th>
                       <th>Action</th>
                   </tr>
               </thead>
               <tbody>
                       
                   <tr>
                   <td></td>
                   <td></td>
                   {{--     <td>
                    <ul class="list-inline">
                           <li class="list-inline-item">
                               <button id="showModalMitra" data-toggle="modal" data-target="#showMitra" title="{{ trans('Lihat Detail') }}" class="btn btn-dark px-3 btn-sm"
                           data-nama="{{$items->nama_depan}} {{$items->nama_belakang}}" data-alamat="{{$items->alamat['alamat']}}" data-provinsi="{{$items->alamat['provinsi']['name']}}"
                           data-kota_kabs="{{$items->alamat['kota_kabupatens']['name']}}" data-kecamatans="{{$items->alamat['kecamatans']['name']}}" data-kel_dess="{{$items->alamat['kelurahan_desa']['name']}}"
                           >
                                   <span class="ti-zoom-in"></span>
                           </button>
                           </li>
                           <li class="list-inline-item">
                           <button data-id="{{$items->id}}" id="updateModalMitra" data-toggle="modal" data-target="#updateStatusMitra" title="{{ trans('Verifikasikan') }}" class="btn btn-success px-3 btn-sm">
                                       <span class="ti-check"></span>
                               </button>
                               </li>
                   </ul>
                       </td> --}}
                     
                   </tr>

               </tbody>
           </table>
       </div>
   </div>    
 </div>

    <!-- Modal Tambah Kategori-->
<div class="modal fade" id="addMitra" tabindex="-1" role="dialog" aria-labelledby="addMitraLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
                {!! Form::open([ 'route' => ['admin-panel.add-kategori'], 'method' => "POST"])!!}

          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addMitraLabel">Tambah Kategori</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" name="nama_kategori" placeholder="Masukan Nama Kategori" required>
                    </div>
            </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-md">Submit</button>
            </div>
            {!! Form::close() !!}

          </div>
        </div>
      </div>
<div class="masonry-item col-md-6">
        <div class="bgc-white p-20 bd">
                <button data-toggle="modal" data-target="#addMitra" class="btn btn-dark btn-md" title="{{ trans('Tambah Mitra') }}">
                        <b><i class="fa fa-plus"></i> Tambah Sub-Kategori</b></button>
               <div class="mT-30">
                   <table id="kelolaSubKategori" class="table table-bordered" cellspacing="0" width="100%">
                       <thead class="thead-light">
                           <tr>
                               <th>Kategori</th>
                               <th>Nama Sub-Kategori</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>
                               
                           <tr>
                            <td></td>
                           <td></td>
                           <td></td>
                           {{--     <td>
                            <ul class="list-inline">
                                   <li class="list-inline-item">
                                       <button id="showModalMitra" data-toggle="modal" data-target="#showMitra" title="{{ trans('Lihat Detail') }}" class="btn btn-dark px-3 btn-sm"
                                   data-nama="{{$items->nama_depan}} {{$items->nama_belakang}}" data-alamat="{{$items->alamat['alamat']}}" data-provinsi="{{$items->alamat['provinsi']['name']}}"
                                   data-kota_kabs="{{$items->alamat['kota_kabupatens']['name']}}" data-kecamatans="{{$items->alamat['kecamatans']['name']}}" data-kel_dess="{{$items->alamat['kelurahan_desa']['name']}}"
                                   >
                                           <span class="ti-zoom-in"></span>
                                   </button>
                                   </li>
                                   <li class="list-inline-item">
                                   <button data-id="{{$items->id}}" id="updateModalMitra" data-toggle="modal" data-target="#updateStatusMitra" title="{{ trans('Verifikasikan') }}" class="btn btn-success px-3 btn-sm">
                                               <span class="ti-check"></span>
                                       </button>
                                       </li>
                           </ul>
                               </td> --}}
                             
                           </tr>
        
                       </tbody>
                   </table>
               </div>
           </div>  
</div>
</div>

@endsection
