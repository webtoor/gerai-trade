<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('users.index');
    }

    public function showDaftarMitra()
    {
        $provinsi = Provinsi::all();

        return view('users.daftarMitra', ['provinsi' => $provinsi]);
    }

    public function insertDaftarMitra(Request $request){
        return $request;
    }
}
