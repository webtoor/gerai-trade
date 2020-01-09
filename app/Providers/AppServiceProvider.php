<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\Models\Transaction;
use App\Models\Produk;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        require_once App_path('Helper/rajaongkir.php');

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::defaultView('vendor.pagination.bootstrap-4');


        $trans= Transaction::with('transaction_detail')->where(['status_id' => '0'])->where('created_at', '<', \Carbon\Carbon::now()->subDays(2))->get();
        foreach($trans as $detail){
                    foreach($detail->transaction_detail as $transdetail){
                        $stok = Produk::where('id', $transdetail->produk_id)->first();
                        $stok->update([
                            'stok' => (($stok->stok) + ($transdetail->qty))
                        ]);
                    }
                }
        Transaction::with('transaction_detail')->where(['status_id' => '0'])->where('created_at', '<', \Carbon\Carbon::now()->subDays(2))->update([
        'status_id' => '5'
        ]);



    }
}
