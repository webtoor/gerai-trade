<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Cart;
use App\Models\Transaction;
use App\Models\Transaction_detail;
use App\Models\TransactionBukti;
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
                    'total_harga' =>  $sum_harga,
                    'kirim_at' => null
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

        // MENUNGGU PEMBAYARAN
        $new_order = collect($order)->unique('kode');
        $order_array = [];
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
       

        // MENUNGGU KONFIRMASI
        $order_bukti = Transaction::with('transaction_bukti')->where(['user_id' => $user_id, 'status_id' => '1'])->orderBy('created_at', 'desc')->get();
        $new_order_bukti = collect($order_bukti)->unique('kode');


        // PESANAN DIPROSES
        $order_proses = Transaction::with(['transaction_detail' => function ($query) {
            $query->with('produk');
        }])->where(['user_id' => $user_id, 'status_id' => '2'])->orderBy('created_at', 'desc')->get();


        // PESANAN DIKIRIM
        $new_order_kirim = [];
        $order_kirim = Transaction::with(['transaction_detail' => function ($query) {
            $query->with('produk');
        }])->where(['user_id' => $user_id, 'status_id' => '3'])->orderBy('created_at', 'desc')->get();

        foreach($order_kirim as $order_kirims){
            $resi = Waybill($order_kirims->no_resi,$order_kirims->ekspedisi); 
            $data = json_decode($resi, true);
             $new_order_kirim[] = collect($order_kirims)->push($data);
          /*   $new_order_kirim[] = collect([
                    'order' => $order_kirims,
                    'resi' => $data
            ]); */
           /*  array_push($new_order_kirim, (object)[
                'order' => $order_kirims,
                'resi' => $data
            ]); */
        }

        //return $new_order_kirim;

       
        /* return $resi = Waybill('SOCAG00183235715','jne'); */


         // PESANAN DIBATALKAN
        $order_batal = Transaction::with(['transaction_detail' => function ($query) {
            $query->with('produk');
        }])->where(['user_id' => $user_id, 'status_id' => '5'])->orderBy('created_at', 'desc')->get();
        if(count($order_array) > 0){
            $tabName = 'mbayar';
        }elseif(count($order_bukti) > 0){
            $tabName = 'mkonfirmasi';
        }elseif(count($order_proses) > 0){
            $tabName = 'mproses';
        }elseif(count($order_batal) > 0){
            $tabName = 'mbatal';
        }elseif(count($order_kirim) > 0){
            $tabName = 'mkirim';
        }else{
            $tabName = 'mproses';

        }
        return view('users.daftarTransaksi', ['order_kirim' => $new_order_kirim,'order_batal' => $order_batal,'order_proses' => $order_proses,'kategori' => $kategori, 'array_order' => $order_array, 'order_bukti' => $new_order_bukti, 'tabName' => $tabName]);
    }

    public function transaksiBatalkan(Request $request){
        //return $request->all();
        Transaction::where('kode', $request->transaksi_kode)->update([
            'status_id' => '5'
        ]);

        return back()->withSuccess(trans('Anda Berhasil Membatalkan Pesanan')); 
    }

    public function transaksiUnggah(Request $request){
        $data = $request->validate([
            'transaksi_kode_bukti' => 'required',
            'jumlah_transfer' => 'required',
            'bank_pengirim' => 'required',
            'nama_pengirim' => 'required',
            'image_pembayaran' => 'required|file|mimes:jpeg,jpg,png|max:5000'
        ]); 
       
        $file = $request->file('image_pembayaran');
        $imageName = 'image_'.time().Str::random(10).'.png';
        $path = Storage::disk('public')->putFileAs('bukti_pembayaran', $file, $imageName);
            TransactionBukti::create([
            'kode_id' => $data['transaksi_kode_bukti'],
            'img_path' => $path,
            'jumlah_transfer' => $data['jumlah_transfer'],
            'nama_bank' => $data['bank_pengirim'],
            'nama_pengirim' => $data['nama_pengirim'],
            'status' => '0'
        ]);

        Transaction::where('kode', $data['transaksi_kode_bukti'])->update([
            'status_id' => '1'
        ]);
        

        return back()->withSuccess(trans('Anda Berhasil Mengunggah Bukti Pembayaran')); 
    }

    public function transaksiSelesai(Request $request){
        return $request->all();
    }
}
