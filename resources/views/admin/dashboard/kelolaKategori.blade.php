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
        <button data-toggle="modal" data-target="#addKategori" class="btn btn-dark btn-md" title="{{ trans('Tambah Mitra') }}">
                <b><i class="fa fa-plus"></i> Tambah Kategori</b></button>
       <div class="mT-30">
           <table id="kelolaKategori" class="table table-bordered" cellspacing="0" width="100%">
               <thead class="thead-light">
                   <tr>
                       <th>#</th>
                       <th>Nama Kategori</th>
                       <th>Action</th>
                   </tr>
               </thead>
               <tbody>
                   <?php $i=1 ?>
                    @foreach ($kategori as $items) 
                   <tr>
                   <td>{{$i++}}</td>
                   <td>{{$items->kategori_name}}</td>
                      <td>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                        <button data-kategori_id="{{$items->id}}" data-kategori_name="{{$items->kategori_name}}" id="updateModalKategori" data-toggle="modal" data-target="#updateKategori" title="{{ trans('Edit') }}" class="btn btn-dark px-3 btn-sm">
                                    <span class="ti-pencil"></span>
                            </button>
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

    <!-- Modal Tambah Kategori-->
<div class="modal fade" id="addKategori" tabindex="-1" role="dialog" aria-labelledby="addKategoriLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
                {!! Form::open([ 'route' => ['admin-panel.add-kategori'], 'method' => "POST"])!!}

          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addKategoriLabel">Tambah Kategori</h5>
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

          <!-- Modal Update Kategori-->
<div class="modal fade" id="updateKategori" tabindex="-1" role="dialog" aria-labelledby="updateKategoriLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
                {!! Form::open([ 'route' => ['admin-panel.update-kategori'], 'method' => "PUT"])!!}

          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="updateKategoriLabel">Tambah Kategori</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Nama Kategori</label>
                        <input type="hidden" name="kategori_id" id="kategori_id" required>
                        <input type="text" class="form-control" name="kategori_name" id="kategori_name" required>
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
                <button data-toggle="modal" data-target="#sitra" class="btn btn-dark btn-md" title="{{ trans('Tambah Mitra') }}">
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
                            <td>dassda</td>
                           <td></td>
                           <td></td>
                    
                               </td>
                             
                           </tr>
        
                       </tbody>
                   </table>
               </div>
           </div>  
</div>
</div>

@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $("button#updateModalKategori").click(function () {
            var kategori_id = $(this).data('kategori_id');
            var kategori_name = $(this).data('kategori_name');
    

            $('#kategori_id').val(kategori_id);
            $('#kategori_name').val(kategori_name);
          });
        });
    </script>
@endsection
