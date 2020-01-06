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


        $new_order_kirim = [];
        $order_kirim = Transaction::with(['user' => function ($query) {
            $query->with('alamat');
        },'transaction_detail' => function ($query) {
            $query->with('produk');
        }])->where(['hub_id' => $hub_id, 'status_id' => '3'])->OrderBy('created_at', 'desc')->get();
        foreach($order_kirim as $order_kirims){
            $resi = Waybill($order_kirims->no_resi,$order_kirims->ekspedisi); 
            $data = json_decode($resi, true);
             $new_order_kirim[] = collect($order_kirims)->push($data);
        }

        //return $new_order_kirim;

        $order_selesai = Transaction::with(['user','transaction_detail' => function ($query) {
            $query->with('produk');
        }])->where(['hub_id' => $hub_id, 'status_id' => '4'])->OrderBy('created_at', 'desc')->paginate(10);


       // return $new_order_kirim;
        if(count($order_baru) > 0){
            $tabName = 'order_baru';
        }elseif(count($new_order_kirim) > 0){
            $tabName = 'order_kirim';
        }else{
            $tabName = 'order_selesai';
        }
        return view('users.hub.penjualan', ['order_selesai' => $order_selesai, 'order_kirim' => $new_order_kirim, 'order_baru' => $order_baru, 'kategori' => $kategori, 'tabName' => $tabName]);

    }

    public function konfirmasiPengiriman(Request $request){
        Transaction::where('id', $request->transaksi_id)->update([
            'status_id' => '3',
            'no_resi' => $request->no_resi
        ]);

        return back()->withSuccess(trans('Anda Berhasil Melakukan Konfirmasi Pengiriman')); 

    }

    public function ajaxOrderSelesai(){
        $hub_id = Auth::user()->id;

        $order_selesai = Transaction::with(['user','transaction_detail' => function ($query) {
            $query->with('produk');
        }])->where(['hub_id' => $hub_id, 'status_id' => '4'])->OrderBy('created_at', 'desc')->paginate(10); 

         return view('users.pagination.HubPesananSelesai', ['order_selesai' => $order_selesai])->render();
    }
}
