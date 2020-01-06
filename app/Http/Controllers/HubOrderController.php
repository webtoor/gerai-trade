<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Transaction_detail;
use App\Models\TransactionBukti;
use App\Models\Kategori;

class HubOrderController extends Controller
{
    public function getPenjualan(){
        $hub_id = Auth::user()->id;
        $kategori = Kategori::with('sub_kategori')->get();

        $order_baru = Transaction::with(['user','transaction_detail' => function ($query) {
            $query->with('produk');
        }])->where(['hub_id' => $hub_id, 'status_id' => '2'])->OrderBy('created_at', 'desc')->get();


        $order_kirim = Transaction::with(['user','transaction_detail' => function ($query) {
            $query->with('produk');
        }])->where(['hub_id' => $hub_id, 'status_id' => '3'])->OrderBy('created_at', 'desc')->get();

        if(count($order_baru) > 0){
            $tabName = 'order_baru';
        }elseif(count($order_kirim) > 0){
            $tabName = 'order_kirim';
        }
        return view('users.hub.penjualan', ['order_kirim' => $order_kirim, 'order_baru' => $order_baru, 'kategori' => $kategori, 'tabName' => $tabName]);

    }

    public function konfirmasiPengiriman(Request $request){
        Transaction::where('id', $request->transaksi_id)->update([
            'status_id' => '3',
            'no_resi' => $request->no_resi
        ]);

        return back()->withSuccess(trans('Anda Berhasil Melakukan Konfirmasi Pengiriman')); 

    }
}
