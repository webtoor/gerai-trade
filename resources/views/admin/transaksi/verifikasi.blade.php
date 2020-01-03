
@extends('admin.default')

@section('content')
<div class="text-center">
    <b>Verifikasi</b>
    <h4 class="c-blue-900"><b>Verifikasi Pembayaran</b></h4>
</div>

<div class="bgc-white p-20 bd">
    <table id="dataTable" class="table table-bordered" cellspacing="0" width="100%">
        <thead class="thead-light">
                   <tr>
                       <th>ID Pemesanan</th>
                       <th>Total Pembayaran</th>
                       <th>Nama Pengirim</th>
                       <th>Jumlah Transfer</th>
                       <th>Nama Bank</th>
                       <th>Tanggal Pembayaran</th>
                       <th>Verifikasi</th>
                       <th>Action</th>
                   </tr>
               </thead>
               <tbody>
                   @foreach($bukti as $list_bukti)
                  <tr>
                  <td>{{$list_bukti->kode_id}}</td>
                  <td>
                    <?php $bayar = 0 ?>
                    @foreach($list_bukti->transaction as $list_bayar)
                    <?php $bayar += ($list_bayar->ongkir) + ($list_bayar->total_harga);?>
                    @endforeach
                    Rp {{number_format($bayar,0, "", ".")}}
                  </td>
                  <td>{{$list_bukti->nama_pengirim}}</td>
                  <td>Rp {{number_format($list_bukti->jumlah_transfer,0, "", ".")}}</td>
                    <td>{{$list_bukti->nama_bank}}</td>
                  <td>{{ date("j-M-Y H:i", strtotime($list_bukti['created_at']))}} WIB</td>
                  <td>@if($list_bukti->status == '0')
                    Belum
                    @else
                    Sudah
                      @endif
                  </td>
                  <td><ul class="list-inline">
                    <li class="list-inline-item">
                    <button id="lihatBukti" data-toggle="modal" data-target="#showBukti" data-bukti="{{$list_bukti->img_path}}" title="{{ trans('Lihat Bukti') }}" class="btn btn-dark px-3 btn-sm">
                               LIHAT BUKTI
                    </button>
                    </li>
                    @if($list_bukti->status == '0')
                    <li class="list-inline-item">
                        <button id="BuktiVerifikasi" data-kode="{{$list_bukti->kode_id}}" data-toggle="modal" data-target="#verifikasiBukti" title="{{ trans('Verifikasi') }}" class="btn btn-success px-3 btn-sm">
                            <span class="fas fa-exclamation-triangle"></span>

                        </button>
                        </li>
                    @endif
                    </ul>
                </td>
                  </tr>
                  @endforeach
               </tbody>
           </table>
       </div>


  <!-- SHOW BUKTI -->
<div class="modal fade" id="showBukti" tabindex="-1" role="dialog" aria-labelledby="showMitraLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div id="foto_produk" style="padding-bottom: 10px; text-align:center"></div>
        </div>
    <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Tutup</button>

          </div>
    </div>
</div>
</div>


  <!-- VERIFIKASI -->
  <div class="modal fade" id="verifikasiBukti" tabindex="-1" role="dialog" aria-labelledby="showMitraLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      {!! Form::open([ 'route' => ['admin-panel.verifikasiProduk'], 'method' => "POST"])!!}

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="kode_uniq"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Apakah Bukti Pembayaran ini Valid?
            <input type="hidden" value="1" name="status">
      </div>
    <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-md" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary btn-md">Submit</button>

          </div>
    </div>
    {!! Form::close() !!}

</div>
</div>

@endsection

@section('js')
<script>
$(document).ready(function () {
  $("#dataTable" ).on( "click","button#lihatBukti", function() {

    var foto_produk = $(this).data('bukti');
        var theImg1 = "/storage/" + foto_produk;

        $('#foto_produk').html('<img id="theImg1" src="'+theImg1 +'"style="width:450px;">')
     
  });
  /* $("button#lihatBukti" ).on( "click", function() {
    console.log('sadasd')
        var foto_produk = $(this).data('bukti');
        var theImg1 = "/storage/" + foto_produk;

        $('#foto_produk').html('<img id="theImg1" src="'+theImg1 +'"style="width:450px;">')
    }); */

    $("#dataTable" ).on( "click","button#BuktiVerifikasi", function() {
        var kode = $(this).data('kode');
        console.log(kode)
        $('#kode_uniq').html(kode)
  });
});

</script>
@endsection