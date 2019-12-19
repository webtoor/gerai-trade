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
                    'total_ongkir' => $row['ongkir'],
                    'total_pembayaran' =>  $sum_harga
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
                'message' => $sum_harga,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 0,
                'error' => $e->getMessage()
            ]);
        }
      
       
    }
}
