@extends('users.default')

@section('content')


<div class="container-fluid">
    <div class="row">
    @include('users.partials.sidebar')
    <div class="col-sm-10">

    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top:10px;">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#wishlist" role="tab" aria-controls="wishlist" aria-selected="true">Menunggu Pembayaran</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="pengaturan" role="tabpanel" aria-labelledby="wishlist-tab">

                    <div class="row" style="margin-top:40px;">
                      <div class="col-sm-12">
                          @include('admin.partials.messages') 
                        @foreach($array_order as $list)
                          <div class="card" style="margin-bottom:20px;">
                            <ul class="list-group list-group-flush">
                            <li class="list-group-item"> <b> <i class="flaticon-bag fa-lg"></i> Pembelian{{-- {{ date("j-M-Y H:i", strtotime($list->order[0]->created_at))}} --}}</b>
                            {{-- <button href="http://" class="float-right btn btn-info btn-md"><b>Unggah Bukti Pembayaran</b></button>
                            <button href="http://" class="float-right btn btn-danger btn-md"><b>Batalkan</b></button> --}}
                              <a href="http://" class="float-right text-danger" style="font-size:14px;">Batalkan</a>
                            </li>
                              <li class="list-group-item">
                                <div class="row">
                                <div class="col-sm-6" style="margin-left:50px;">
                                <div style="font-size:14px;margin-bottom:10px;">Total : <b  style="color:#fa591d; margin-right:10px;" >Rp {{number_format($list->total_pembayaran,0, "", ".")}}</b> Tanggal Pembelian : {{ date("j-M-Y H:i", strtotime($list->order[0]->created_at))}} WIB</div>
                                <div style="background:#f8f9fa; font-size:13px; margin-bottom:10px; height:40px;">
                                  <div style="padding:10px;">Bayar sebelum {{ date("j-M-Y, H:i", strtotime($list->order[0]->created_at .  ' +2 day'))}} WIB</div>
                                </div>

                                <div style="font-size:14px;margin-bottom:5px;">No Rekening Trade : 037601001110308 a.n Koperasi Kemitraan Daya Mandiri</div>
                                </div>
                                <div class="col-sm-5 text-center">
                                  <div class="peer">
                                    <img src="/images/bank/bri.png" alt="" style="width:100px;">
                                  </div>
                                  <div style="margin-top:20px;">
                                    <button href="http://" class="btn btn-outline-dark btn-md"><b>Unggah Bukti Pembayaran</b></button>
                                  </div>
                                </div>
                                </div>
                              </li>
      
                            </ul>
                          </div>

                          @endforeach

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