<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Transaction_detail;
use App\Models\TransactionBukti;

class HubOrderController extends Controller
{
    public function getPenjualan(){
        $hub_id = Auth::user()->id;

        $order_baru = Transaction::where(['hub_id' => $hub_id, 'status_id' => '2'])->get();
    }
}
