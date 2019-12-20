@extends('users.default')

@section('content')


<div class="container-fluid">
    <div class="row">
    @include('users.partials.sidebar')
    <div class="col-sm-10">

    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top:10px;">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#wishlist" role="tab" aria-controls="wishlist" aria-selected="true">Alamat Penerima</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="pengaturan" role="tabpanel" aria-labelledby="wishlist-tab">

                    <div class="row" style="margin-top:40px;">
                      <div class="col-sm-12">
                          @include('admin.partials.messages') 
                      
                                              <div class="mT-20">
                            <table class="table" cellspacing="0" width="100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Nama Penerima</th>
                                        <th>Alamat Penerima</th>
                                        <th>Daerah Penerima</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <tr>
                                        <td><div class="br"></div>
                                          <div style="font-size:12px;"></div>
                                        </td>
                                        <td> </td>
                                        <td><div class="br">{</div></td>
                                        <td>

                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <button id="ubahAlamats" data-toggle="modal" data-target="#ubahAlamat" title="{{ trans('Lihat Detail') }}" class="btn btn-dark px-3 btn-sm"
                                                data-uid="{{$alamats->id}}" data-unama_penerima="{{$alamats->nama_penerima}}" data-unohp_penerima="{{$alamats->nohp_penerima}}" data-ualamat="{{$alamats->alamat}}"
                                                ><span class="ti-pencil"></span>
                                                      Ubah
                                                </button>
                                                </li>
                                               {{--  <li class="list-inline-item">
                                                    {!! Form::open([
                                                        'class'=>'delete',
                                                        'url'  => route('delete-alamat', $alamats->id), 
                                                        'method' => 'DELETE',
                                                        ]) 
                                                    !!}
                                                        <button class="btn btn-danger px-3 btn-sm" title="{{ trans('app.delete_title') }}"><i class="ti-trash"></i>Hapus</button>
                                                        
                                                    {!! Form::close() !!}
                                                </li> --}}
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
</div>
    <!-- Modal Tambah Alamat-->
{{-- <div class="modal fade" id="addAlamat" tabindex="-1" role="dialog" aria-labelledby="addKategoriLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
          {!! Form::open([ 'route' => ['post-alamat'], 'method' => "POST"])!!}

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addKategoriLabel">Alamat Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Nama Penerima <sup style="color:red"> *Wajib</sup></label>
          <input type="text" class="form-control" name="nama_penerima" placeholder="Masukan Nama Penerima" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Nomor Hp <sup style="color:red"> *Wajib</sup></label>
          <input type="number" class="form-control" name="nohp_penerima" placeholder="Masukan Nomor Hp" required>
        </div>
      </div>
      <div class="form-group">
        <label>Alamat <sup style="color:red"> *Wajib</sup></label>
        <textarea type="text" class="form-control" name="alamat" placeholder="Masukan Alamat" required></textarea>
    </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Provinsi <sup style="color:red"> *Wajib</sup></label>
          <select class="form-control" name="province_id" id="selectProvinsi" required>
              <option selected value="">Pilih Provinsi</option>
                  @php
                  $province = province();
                  $province = json_decode($province,true);
              @endphp
              @foreach($province['rajaongkir']['results'] as $provinces)
                  <option value="{{ $provinces['province_id'] }}">{{ $provinces['province'] }} </option>
                @endforeach  
              </select>
        </div>
        <div class="form-group col-md-6">
          <label>Kota/Kabupaten <sup style="color:red"> *Wajib</sup></label>
          <select class="form-control" name="city_id" id="selectKotaKab" required="true" disabled="disabled">
            <option selected value="">Pilih Kota/Kabupaten</option>
      
        </select>       
       </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Kecamatan <sup style="color:red"> *Wajib</sup></label>
          <select class="form-control" name="kecamatan_id" id="selectKecamatan" required="true" disabled="disabled">
            <option selected value="">Pilih Kecamatan</option>
      
        </select>
        </div>
        <div class="form-group col-md-6">
            <label>Kode Pos</label>
            <input type="text" id="kodepos" name="kodepos" class="form-control">
            
            </div>
      </div>
      </div>
      <div class="modal-footer">
          <input type="hidden" name="province_name" id="province_name">
          <input type="hidden" name="city_name" id="city_name">
          <input type="hidden" name="kecamatan_name" id="kecamatan_name">
        <button type="submit" class="btn btn-primary btn-md">Submit</button>
      </div>
      {!! Form::close() !!}

    </div>
  </div>
</div> --}}

@endsection
@section('js')
<script>

    $(document).ready(function () {
     
  
});
</script>
    
@endsection