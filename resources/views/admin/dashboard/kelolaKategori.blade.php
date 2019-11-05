@extends('admin.default')

@section('content')
<div class="text-center">
    <b>Kategori</b>
    <h4 class="c-blue-900"><b>Kelola Kategori</b></h4>
</div>
<div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item col-md-6">
<div class="bgc-white p-20 bd">
        <button data-toggle="modal" data-target="#addKategori" class="btn btn-dark btn-md" title="{{ trans('Tambah Mitra') }}">
                <b><i class="fa fa-plus"></i> Tambah Kategori</b></button>
       <div class="mT-30">
           <table id="kelolaKategori" class="table  table-bordered" cellspacing="0" width="100%">
               <thead class="indigo white-text">
                   <tr>
                       <th>Nama Kategori</th>
                       <th>Action</th>
                   </tr>
               </thead>
               <tbody>
                    @foreach ($kategori as $items) 
                   <tr>
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
              <h5 class="modal-title" id="updateKategoriLabel">Edit Kategori</h5>
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
                <button data-toggle="modal" data-target="#addSubKategori" class="btn btn-dark btn-md" title="{{ trans('Tambah Mitra') }}">
                        <b><i class="fa fa-plus"></i> Tambah Sub-Kategori</b></button>
               <div class="mT-30">
                   <table id="kelolaSubKategori" class="table table-bordered" cellspacing="0" width="100%">
                       <thead class="indigo white-text">
                           <tr>
                               <th>Kategori</th>
                               <th>Nama Sub-Kategori</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>
                            @foreach ($sub_kategori as $itemb) 
                           <tr>
                            <td>{{$itemb->kategori->kategori_name}}</td>
                           <td>{{$itemb->subkategori_name}}</td>
                           <td>  <ul class="list-inline">
                                <li class="list-inline-item">
                                <button data-subkategori_id="{{$itemb->id}}" data-kategori_id="{{$itemb->kategori_id}}" data-subkategori_name="{{$itemb->subkategori_name}}" id="updateModalSubKategori" data-toggle="modal" data-target="#updateSubKategori" title="{{ trans('Edit') }}" class="btn btn-dark px-3 btn-sm">
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
</div>

    <!-- Modal Tambah Kategori-->
    <div class="modal fade" id="addSubKategori" tabindex="-1" role="dialog" aria-labelledby="addSubKategoriLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                    {!! Form::open([ 'route' => ['admin-panel.add-subkategori'], 'method' => "POST"])!!}
    
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addSubKategoriLabel">Tambah Sub-Kategori</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <div class="form-row">
                        <div class="form-group col-md-12">
                                <label>Pilih Kategori</label>
                                <select  class="form-control" name="kategori_id" required> 
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategori as $itemx)
                                <option value="{{$itemx->id}}">{{$itemx->kategori_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        <div class="form-group col-md-12">
                            <label>Nama Sub-Kategori</label>
                            <input type="text" class="form-control" name="nama_subkategori" placeholder="Masukan Nama Sub-Kategori" required>
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



                   <!-- Modal Update SubKategori-->
<div class="modal fade" id="updateSubKategori" tabindex="-1" role="dialog" aria-labelledby="updateSubKategoriLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
                {!! Form::open([ 'route' => ['admin-panel.update-subkategori'], 'method' => "PUT"])!!}

          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="updateSubKategoriLabel">Edit Sub-Kategori</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="form-row">
                    <div class="form-group col-md-12">
                            <label>Kategori</label>
                            <select class="form-control" name="kategori_ids" id="kategori_ids" required> 
                                @foreach ($kategori as $itemx)
                            <option value="{{$itemx->id}}">{{$itemx->kategori_name}}</option>
                                @endforeach

                            </select>
                        </div>
                    <div class="form-group col-md-12">
                        <label>Nama Sub-Kategori</label>
                        <input type="hidden" name="subkategori_id" id="subkategori_id" required>
                        <input type="text" class="form-control" name="subkategori_name" id="subkategori_name" required>
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

          $("button#updateModalSubKategori").click(function () {
            var subkategori_id = $(this).data('subkategori_id');
            var kategori_ids = $(this).data('kategori_id');
            var subkategori_name = $(this).data('subkategori_name');
            console.log(kategori_id)
            $('#subkategori_id').val(subkategori_id);
            $('#kategori_ids').val(kategori_ids);
            $('#subkategori_name').val(subkategori_name);
          });
        });
    </script>
@endsection
