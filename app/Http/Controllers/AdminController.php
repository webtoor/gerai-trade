<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\User_role;
use App\Models\Provinsi;
use App\Models\Alamat;
use App\Models\Kategori;
use App\Models\SubKategori;
use App\Models\Blog;
use App\Models\Produk;
use App\Models\ProdukImage;
use App\Models\Pesan;
use App\Models\PesanDetail;

class AdminController extends Controller
{
    public function index()
    {
        $member = User_role::where('role_id', '1')->get();
        $mitra = User_role::where('role_id', '2')->get();
        /* $reqMitra = User::with(['alamat' => function ($query) {
            $query->with('provinsi', 'kota_kabupatens', 'kecamatans', 'kelurahan_desa')->where(['jenis_alamat_id' => '1']);
        } ])->where(['status_mitra' => '2'])->get(); */
        $blog = Blog::where('status', '0')->get();
        $produk = Produk::where('status', '0')->get();
        return view('admin.dashboard.index', ['request_produk' => $produk,'jumlah_member' => count($member), 'jumlah_mitra' => count($mitra), 'request_blog' => $blog]);
    }

    public function updateStatusMitra(Request $request){
        $user = User::findOrFail($request->user_id)->update([
            'status_mitra' => '1'
        ]);
        User_role::where('user_id', $request->user_id)->update([
            'role_id' => '2'
        ]);

        return back()->withSuccess(trans('Berhasil, user tersebut telah menjadi Mitra')); 

    }

    public function verifikasiCerita(Request $request){
        /* return $request; */
        $data = $request->validate([
            'status_id' => ['required'],
            'cerita_id' => 'required',
            'komentar' => 'nullable'
        ]); 
        try {
            $now = date("Y-m-d H:i:s", strtotime('now'));

            if($data['status_id'] == '1'){
                Blog::where('id', $data['cerita_id'])->update([
                    'status' => '1',
                    'komentar' => $data['komentar'],
                    'dtapproved' => $now,
                ]);

            }else{
                Blog::where('id', $data['cerita_id'])->update([
                    'status' => '0',
                    'komentar' => $data['komentar']
                ]);

            }
            return back()->withSuccess(trans('Berhasil')); 



        } catch (\Throwable $th) {
            //throw $th;
        }
    

    }

    public function verifikasiProduk(Request $request){
        /* return $request; */
        $data = $request->validate([
            'status_id' => 'required',
            'produk_id' => 'required',
            'komentar' => 'nullable'
        ]); 
        try {
            $now = date("Y-m-d H:i:s", strtotime('now'));

            if($data['status_id'] == '1'){
                Produk::where('id', $data['produk_id'])->update([
                    'status' => '1',
                    'komentar' => $data['komentar'],
                    'dtapproved' => $now,
                ]);

            }else{
                Produk::where('id', $data['produk_id'])->update([
                    'status' => '0',
                    'komentar' => $data['komentar']
                ]);

            }
            return back()->withSuccess(trans('Berhasil')); 



        } catch (\Throwable $th) {
            //throw $th;
        }
    

    }

    public function kelolaKategori(){
        $kategori = Kategori::all();
        $sub_kategori = SubKategori::with('kategori')->get();

        return view('admin.dashboard.kelolaKategori', ['kategori' => $kategori, 'sub_kategori' => $sub_kategori]);

    }

    public function showMember(){
        try {
            $member = User_role::with(['user', 'alamat' => function ($query) {
                $query->where(['jenis_alamat_id' => '2']);
            }])->where('role_id', '1')->OrderBy('id', 'desc')->get();
            return view('admin.dashboard.member', ['member' => $member]);

        } catch (\Exception $e) {
        }
    }

    public function showMitra(){
      
        try {
            $mitra = User_role::with(['user', 'alamat' => function ($query) {
                $query->where(['jenis_alamat_id' => '1']);
            } ])->where('role_id', '2')->OrderBy('id', 'desc')->get();
            $provinsi = province();
            return view('admin.dashboard.mitra', ['mitra' => $mitra, 'provinsi' => $provinsi]);

        } catch (\Exception $e) {

        }
    }

    public function addMitra(Request $request){
        $data = $request->validate([
            'nama_hub' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/', 'max:15'],
            'nama_depan' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/', 'max:15'],
            'nama_belakang' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'nomor_ponsel' => ['required', 'string','min:10', 'max:14', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'alamat' => ['required'],
            'province_id' => ['required'],
            'province_name' => ['required'],
            'city_id' => ['required'],
            'city_name' => ['required'],
            'kecamatan_id' => ['required'],
            'kecamatan_name' => ['required'],
            'kodepos' => ['nullable']
        ]); 

        try {
            $result = User::create([
                'nama_hub' => $data['nama_hub'],
                'nama_depan' => $data['nama_depan'],
                'nama_belakang' => $data['nama_belakang'],
                'nomor_ponsel' => $data['nomor_ponsel'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'status_mitra' => '1'
            ]);

            User_role::create([
                'user_id' => $result->id,
                'role_id' => '2'
            ]);

            Alamat::create([
                'alamat' => $data['alamat'],
                'user_id' => $result->id,
                'jenis_alamat_id' => '1',
                'province_id' => $data['province_id'],
                'province_name' => $data['province_name'],
                'city_id' => $data['city_id'],
                'city_name' => $data['city_name'],
                'kecamatan_id' => $data['kecamatan_id'],
                'kecamatan_name' => $data['kecamatan_name'],
                'kodepos' => $data['kodepos']
            ]);

            $new_hub = new \stdClass();
            $new_hub->full_name = $data['nama_depan'] .' ' .$data['nama_belakang'];
            $new_hub->email = $data['email'];
            $new_hub->subject = 'Informasi Login Akun Trade';  
            $new_hub->nomor_ponsel = $data['nomor_ponsel'];  
            $new_hub->password = $data['password'];  
    
    
            Mail::send('admin.partials.mail.hubbaru', ['full_name' => $new_hub->full_name, 'email' => $new_hub->email, 'subject' => $new_hub->subject, 'password' => $new_hub->password, 'nomor_ponsel' => $new_hub->nomor_ponsel  ], function($mail) use ($new_hub){
                $mail->from('_donotreply@geraitrade.com','Trade');
                $mail->to($new_hub->email)->subject($new_hub->subject);
            });

            return back()->withSuccess(trans('Anda Berhasil menambahkan mitra')); 
        } catch (\Exception $e) {
            
        }
    }

    public function editHub($user_id){
       $hub = User::with('alamat')->where('id', $user_id)->first();
        /* return allcity(12) */;
        return view('admin.dashboard.editHub', ['hub' => $hub]);
    }

    public function updateHub(Request $request, $hub_id){
      $data = $request->validate([
            'nama_hub' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/', 'max:15'],
            'nama_depan' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/', 'max:15'],
            'nama_belakang' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users,email,'.$hub_id ],
            'nomor_ponsel' => ['required', 'string','min:10', 'max:14', 'unique:users,nomor_ponsel,'.$hub_id ],
            'alamat' => ['required'],
            'alamat_id' => ['required'],
            'province_id' => ['required'],
            'province_name' => ['required'],
            'city_id' => ['required'],
            'city_name' => ['required'],
            'kecamatan_id' => ['required'],
            'kecamatan_name' => ['required'],
            'kodepos' => ['nullable']
        ]); 
        try {
            User::findOrFail($hub_id)->update([
                'nama_hub' => $data['nama_hub'],
                'nama_depan' => $data['nama_depan'],
                'nama_belakang' => $data['nama_belakang'],
                'nomor_ponsel' => $data['nomor_ponsel'],
                'email' => $data['email'],
            ]);
            Alamat::where(['id' => $data['alamat_id'],'user_id' => $hub_id, 'jenis_alamat_id' => '1'])->update([
                'alamat' => $data['alamat'],
                'province_id' => $data['province_id'],
                'province_name' => $data['province_name'],
                'city_id' => $data['city_id'],
                'city_name' => $data['city_name'],
                'kecamatan_id' => $data['kecamatan_id'],
                'kecamatan_name' => $data['kecamatan_name'],
                'kodepos' => $data['kodepos']
            ]);

            return redirect()->route('admin-panel.showMitra')->withSuccess(trans('Anda Berhasil mengedit Hub')); 
        } catch (\Throwable $th) {
        //throw $th;
        }
       

    }

    public function deleteMitra($user_id){
        $user_table = User::findOrFail($user_id);
        $user_table->delete();
        DB::statement("ALTER TABLE users AUTO_INCREMENT = 1");
        DB::statement("ALTER TABLE user_roles AUTO_INCREMENT = 1");
        DB::statement("ALTER TABLE blogs AUTO_INCREMENT = 1");  
        DB::statement("ALTER TABLE products AUTO_INCREMENT = 1");
        DB::statement("ALTER TABLE product_images AUTO_INCREMENT = 1");
        DB::statement("ALTER TABLE pesan_details AUTO_INCREMENT = 1");
        DB::statement("ALTER TABLE alamats AUTO_INCREMENT = 1");

        return back()->withSuccess(trans('Anda Berhasil menghapus Hub')); 
    }

    public function getPesan(){
        $pesan = Pesan::with(['user', 'pesan_detail' => function ($query) {
            $query->orderBy('created_at');
        }])->orderBy('updated_at', 'desc')->get();
        if(count($pesan) > 0){
            $id_pesan = $pesan[0]->id;
            Pesan::where('id', $id_pesan)->update([
                'admin_read' => '1'
            ]);
        }else{
            $id_pesan = null;
        }
        return view('admin.dashboard.pesan', ['pesan' => $pesan, 'id_pesan' => $id_pesan, 'key_array' => 0]);
    }

    public function getPesanById($pesan_id){
       
        $pesan = Pesan::with(['user', 'pesan_detail' => function ($query) {
            $query->orderBy('created_at');
        }])->orderBy('updated_at', 'desc')->get();
        if(count($pesan) > 0){
            Pesan::where('id', $pesan_id)->update([
                'admin_read' => '1',
                'updated_at' => $pesan[0]->updated_at
            ]);
        }
       
        $keys = null;
        foreach($pesan as $key => $value){
            if(($value->id) == ($pesan_id)){
                $keys = $key;
              
            }
          
        }
        $id_pesan = $pesan_id;
       
        return view('admin.dashboard.pesan', ['pesan' => $pesan, 'id_pesan' => $id_pesan, 'key_array' => $keys]);

    }

    public function postAjaxPesan(Request $request){
        try {

            $check = Pesan::where('id', $request->pesan_id)->first();
            if($check){
                $check->update([
                   'client_read' => '0'
                ]);
            }
            PesanDetail::create([
                'pesan_id' => $request->pesan_id,
                'pesan' => $request->pesan,
                'admin_id' => $request->user_id
            ]);     
            return response()->json([
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage()
            ]);
        }
        
    }


}
