<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
class KategoriController extends Controller
{
    public function addKategori(Request $request){
        $data = $request->validate([
            'nama_kategori' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/', 'max:20'],
        ]);

        try {
            Kategori::create([
                'kategori_name' => $data['nama_kategori']
            ]);
            return back()->withSuccess(trans('Berhasil, Menambahkan Kategori')); 


        } catch (\Exception $e) {
            return $e;
        }

    }
}
