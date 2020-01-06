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

        $order_baru = Transaction::with(['transaction_detail' => function ($query) {
            $query->with('produk');
        }])->where(['hub_id' => $hub_id, 'status_id' => '2'])->get();

        return view('users.hub.penjualan', ['order_baru' => $order_baru, 'kategori' => $kategori]);

    }
}
