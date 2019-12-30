@extends('admin.default')

@section('content')
<div class="text-center">
    <b>Menu Transaksi</b>
    <h4 class="c-blue-900"><b>Transaksi</b></h4>
</div>
<div class="bgc-white p-20 bd">
    <div class="mT-30">
        <table id="dataTable" class="table table-bordered" cellspacing="0" width="100%">
            <thead class="thead-light">
                <tr>
                    <th width="150px">Nama Pembeli</th>
                    <th>Nama Hub</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                    <th width="170px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order as $list_order)
                <tr>
                    <td>{{$list_order->user->nama_depan}} {{$list_order->user->nama_belakang}}</td>
                    <td>{{$list_order->hub->nama_hub}}</td>
                    <td><?php $subtotal = $list_order->total_harga + $list_order->ongkir; ?>
                        Rp {{number_format($subtotal,0, "", ".")}}</td>
                    <td>
                        @if($list_order->status_id == '0')
                        Menunggu Pembayaran
                        @elseif($list_order->status_id == '1')
                        Menunggu Konfirmasi 
                        @elseif($list_order->status_id == '2')
                        Pesanan Diproses
                        @elseif($list_order->status_id == '3')
                        Pesanan Dikirim
                        @elseif($list_order->status_id == '4')
                        Pesanan Selesai
                        @elseif($list_order->status_id == '5')
                        Pesanan Dibatalkan
                        @endif
                    </td>
                
                    <td>
                            <ul class="list-inline">
                                    <li class="list-inline-item">
                                            <button style="border-radius:45%;"  id="showModalCerita" data-toggle="modal" data-target="#showCerita" title="{{ trans('Lihat Detail') }}" class="btn btn-dark px-3 btn-sm">
                                                <span class="ti-zoom-in"></span>
                                        </button>
                                        </li>
                                    <li class="list-inline-item">
                                        <a style="border-radius:45%;" href="#" title="{{ trans('Edit Cerita') }}" class="btn btn-info px-3 btn-sm">
                                            <span class="ti-pencil"></span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                            {!! Form::open([
                                                'class'=>'delete',
                                                'url'  => '', 
                                                'method' => 'DELETE',
                                                ]) 
                                            !!}
                                                <button class="btn btn-danger px-3 btn-sm" title="{{ trans('Hapus Cerita') }}" style="border-radius:45%;"><i class="ti-trash"></i></button>
                                                
                                            {!! Form::close() !!}
                                        </li>
                            </ul>
                      
                    </td>
                  @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection