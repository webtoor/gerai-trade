<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class UserOrderController extends Controller
{
    public function postCheckout(Request $request){
        return response()->json($request->all);
    }
}
