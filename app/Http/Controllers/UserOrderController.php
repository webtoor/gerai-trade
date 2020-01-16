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
use App\Models\ProdukUlasan;
use PDF;
use Illuminate\Support\Facades\Mail;

class UserOrderController extends Controller
{
    public function postCheckout(Request $request){
      
        try {
            $user_id = Auth::user()->id;
            $alamat = Alamat::where('user_id', $user_id)->first();
            $data = $request->data;
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
            $ctts = $request->ctt;
            $i=0;
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
                        'qty' => $cartz->qty,
                        'catatan' => $ctts[$i++]
                    ]);

                    $stok = Produk::where('id', $transaction_detail->produk_id)->first();
                    $stok->update([
                        'stok' => ($stok->stok) - ($cartz->qty)
                    ]);

                    }
                }
              
            }
            Cart::instance('default')->destroy();

            return response()->json([
                'status' => 1,
                'data' => $i++
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
        $order_kirim = Transaction::with(['user' => function ($query) {
            $query->with('alamat');
        },'transaction_detail' => function ($query) {
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

        // PESANAN SELESAI
        $order_selesai = Transaction::with(['produk_ulasan','transaction_detail' => function ($query) {
            $query->with('produk');
        }])->where(['user_id' => $user_id, 'status_id' => '4'])->orderBy('created_at', 'desc')->get();
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
            $tabName = 'mselesai';

        }
        return view('users.daftarTransaksi', ['order_selesai' => $order_selesai,'order_kirim' => $new_order_kirim,'order_batal' => $order_batal,'order_proses' => $order_proses,'kategori' => $kategori, 'array_order' => $order_array, 'order_bukti' => $new_order_bukti, 'tabName' => $tabName]);
    }

    public function transaksiBatalkan(Request $request){
        //return $request->all();
        $trans = Transaction::with('transaction_detail')->where('kode', $request->transaksi_kode)->get();
        foreach($trans as $detail){
            foreach($detail->transaction_detail as $transdetail){
                $stok = Produk::where('id', $transdetail->produk_id)->first();
                $stok->update([
                    'stok' => (($stok->stok) + ($transdetail->qty))
                ]);
            }
        }

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
        $check = TransactionBukti::where('kode_id',$data['transaksi_kode_bukti'] )->get();
        if(count($check) > 0){
            TransactionBukti::where('kode_id',$data['transaksi_kode_bukti'] )->delete();
        }

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
    
                $bayar = new \stdClass();
                $bayar->no_invoice = $data['transaksi_kode_bukti'];
                $bayar->email = 'hairudinberry@gmail.com';
                $bayar->subject = 'Notifikasi Bukti Pembayaran';  
        
        
                Mail::send('admin.partials.mail.pembayaran', ['invoice' => $bayar->no_invoice, 'subject' => $bayar->subject ], function($mail) use ($bayar){
                    $mail->from('_donotreply@geraitrade.com','TraDe');
                    $mail->to($bayar->email)->subject($bayar->subject);
                });
                return back()->withSuccess(trans('Anda Berhasil Mengunggah Bukti Pembayaran')); 

    }

    public function transaksiSelesai(Request $request){
        Transaction::where('id', $request->trans_id)->update([
            'status_id' => '4'
        ]);

        return back()->withSuccess(trans('Anda Berhasil Konfirmasi Barang Sudah Sampai')); 

    }

    public function beriUlasan(Request $request){
        //return $request->all();
        $user_id = Auth::user()->id;
        ProdukUlasan::create([
            'user_id' => $user_id,
            'transaction_id' => $request->tran_id,
            'produk_id' => $request->produk_id,
            'rating' => $request->rating,
            'ulasan' => $request->ulasan
        ]);

        $rating = ProdukUlasan::where('produk_id', $request->produk_id)->avg('rating');
        Produk::where('id', $request->produk_id)->update([
            'rating' => $rating
        ]);
        return back()->withSuccess(trans('Terima kasih atas ulasan Anda')); 

    }

    public function showInvoice($kode){
        $user_id = Auth::user()->id;
        $invoice =  Transaction::with(['user' => function ($query) {
            $query->with('alamat');
        },'transaction_detail' => function ($query) {
            $query->with('produk');
        }])->where(['kode' => $kode, 'user_id' => $user_id])->get();
        $new_invoice = [];
        $totals = 0;
        foreach($invoice as $data){
            $totals += $data->ongkir + $data->total_harga;
        }
        array_push($new_invoice, (object)[
            'order' => $invoice,
            'total_pembayaran' => $totals
        ]);

        //return $new_invoice;
        return view('users.invoice.member', ['invoice' => $new_invoice]);
    }
    /* public function cetakInvoice($kode){
        $user_id = Auth::user()->id;
        $invoice =  Transaction::with(['user', 'transaction_detail' => function ($query) {
            $query->with('produk');
        }])->where(['kode' => $kode, 'user_id' => $user_id])->get();
        $new_invoice = [];
        $totals = 0;
        foreach($invoice as $data){
            $totals += $data->ongkir + $data->total_harga;
        }
        array_push($new_invoice, (object)[
            'order' => $invoice,
            'total_pembayaran' => $totals
        ]);
        $pdf = PDF::loadview('users.invoice.member', ['invoice' =>  $new_invoice]);
	    return $pdf->download('laporan-pegawai-pdf');
    } */
}
