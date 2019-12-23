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
                          
                              <a id="clickBatal" class="float-right text-danger" style="font-size:14px;" data-toggle="modal" data-target="#batalkan" data-trans_kode="{{$list->order[0]->kode}}">Batalkan</a>
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
                                    <button class="btn btn-outline-dark btn-md" id="buktiPembayarans" data-toggle="modal" data-target="#buktiPembayaran" ><b>Unggah Bukti Pembayaran</b></button>
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

<!-- BATALKAN PESANAN -->
<div class="modal fade" id="batalkan" tabindex="-1" role="dialog" aria-labelledby="batalkanLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    {!! Form::open([ 'route' => ['home.transaksiBatalkan'], 'method' => "POST"])!!}

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembatalan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Batalkan transaksi Anda?
        <input type="hidden" value="3" name="status_id">
        <input type="hidden" id="transaksi_kode" name="transaksi_kode">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-primary btn-sm" >Ya</button>
      </div>
    </div>
    {!! Form::close() !!}

  </div>
</div>


<!-- BUKTI PESANAN -->

<div class="modal fade" id="buktiPembayaran" tabindex="-1" role="dialog" aria-labelledby="batalkanLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    {{-- {!! Form::open([ 'route' => ['home.transaksiBatalkan'], 'method' => "POST"])!!} --}}

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Unggah Bukti Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div class="form-group col-md-6">
              <label for="inputEmail4">Jumlah Transfer <sup style="color:red"> *Wajib</sup></label>
              <input type="text" class="form-control" name="jumlah_transfer" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Bank Pengirim <sup style="color:red"> *Wajib</sup></label>
            <input type="text" class="form-control" name="bank_pengirim" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="inputEmail4">Nama Pengirim <sup style="color:red"> *Wajib</sup></label>
          <input type="text" class="form-control" name="nama_pengirim" required>
        </div>
    </div>
      <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Pilih Gambar <sup style="color:red"> *Wajib</sup></label>
            <input type="file" name="image_pembayaran" required>
          </div>
      </div>

    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary btn-sm" >Submit</button>
      </div>
    </div>
   {{--  {!! Form::close() !!} --}}

  </div>
</div>
   
@endsection
@section('js')
<script>

    $(document).ready(function () {
      $("a#clickBatal").click(function () {
            var trans_kode = $(this).data('trans_kode');
            console.log(trans_kode)
            $('#transaksi_kode').val(trans_kode);
        });
    });
</script>
    
@endsection