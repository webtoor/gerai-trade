<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
/* use Illuminate\Foundation\Auth\RegistersUsers; */
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_role;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /* use RegistersUsers; */

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    /* protected $redirectTo = '/home'; */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
  /*   protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    } */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
   /*  protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
 */

    public function showRegistrationForm(){
        return view ('auth.register');
    }
    public function register(Request $request){
        /* return $request; */
        $data = $request->validate([
            'nama_depan' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/', 'max:15'],
            'nama_belakang' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'nomor_ponsel' => ['required', 'string','min:11', 'max:14', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]); 
        try {
           $result = User::create([
                'nama_depan' => $data['nama_depan'],
                'nama_belakang' => $data['nama_belakang'],
                'nomor_ponsel' => $data['nomor_ponsel'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'status_mitra' => '0',
            ]);

            User_role::create([
                'user_id' => $result->id,
                'role_id' => '1'
            ]);
            
            return redirect()->route('login', ['message' => 1]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    
    }
}
