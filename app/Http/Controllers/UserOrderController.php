<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Cart;
use App\Models\Transaction;
use App\Models\Transaction_detail;
use App\Models\Alamat;
use App\Models\Produk;
use App\Models\Kategori;

class UserOrderController extends Controller
{
    public function postCheckout(Request $request){
        try {
            $user_id = Auth::user()->id;
            $alamat = Alamat::where('user_id', $user_id)->first();
            $data = $request->all();
            $total_ongkir = 0; 

            // To String Total Pembayaran
            $total_harga = Cart::instance('default')->total();
            $str=substr($total_harga, 0, strrpos($total_harga, '.'));
            $total_harga_number = str_replace(",", "", $str);  


            $now = date("YmdHi", strtotime('now'));
            $random = Str::random(5);
            $merge_random = $random.$now.$user_id;
            $check_kode = Transaction::where('kode', $merge_random)->get();
            if(count($check_kode) > 0){
                $random = Str::random(5);
                $merge_random = $random.$now.$user_id;
            }

            foreach($data as $row){
                $sum_harga = 0;
                $qty = 0;
                foreach(Cart::content('default') as $cart){
                 if($cart->options->hub_id == $row['hub_id']){
                    $sum_harga += ($cart->price) * ($cart->qty);
                 }
                }
                $transaction = Transaction::create([
                    'kode' => $merge_random,
                    'user_id'=> $user_id,
                    'hub_id' => $row['hub_id'],
                    'alamat_penerima' => $alamat->id ,
                    'ekspedisi' => $row['courier'],
                    'service' => $row['service'],
                    'no_resi' => null,
                    'status_id' => "0",
                    'ongkir' => $row['ongkir'],
                    'total_harga' =>  $sum_harga
                ]);

                foreach (Cart::content('default') as $cartz) {
                    if ($cartz->options->hub_id == $row['hub_id']) {
                        $transaction_detail = Transaction_detail::create([
                        'transaction_id' => $transaction->id,
                        'produk_id' => $cartz->id,
                        'qty' => $cartz->qty
                    ]);
                    }
                }
              
            }
            return response()->json([
                'status' => 1,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 0,
                'error' => $e->getMessage()
            ]);
        }
      
       
    }


    public function getWaitPayment(){
        $kategori = Kategori::with('sub_kategori')->get();
        $user_id = Auth::user()->id;
        $order = Transaction::where(['user_id' => $user_id, 'status_id' => '0'])->orderBy('created_at', 'desc')->get();

        $new_order = collect($order)->unique('kode');
        $order_array = [];
        $foo = [];
        foreach($new_order as $data){
            $totals = 0;
            $total = Transaction::where(['user_id' => $user_id, 'status_id' => '0', 'kode' => $data->kode])->get();
            foreach($total as $data_check){
                $totals +=  $data_check->ongkir + $data_check->total_harga; 
            }
            array_push($order_array, (object)[
                'order' => $total,
                'total_pembayaran' => $totals
            ]);
        }
       

        /* return $order_array; */



        return view('users.daftarTransaksi', ['kategori' => $kategori, 'array_order' => $order_array]);
    }

    public function transaksiBatalkan(Request $request){
        Transaction::where('kode', $request->transaksi_kode)->update([
            'status_id' => '3'
        ]);

        return back()->withSuccess(trans('Anda Berhasil Membatalkan Pesanan')); 

    }
}
