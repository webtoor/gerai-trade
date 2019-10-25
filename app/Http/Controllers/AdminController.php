<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\User_role;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function showMember(){
        try {
            $member = User_role::with('user')->where('role_id', '1')->get();
            return view('admin.dashboard.member', ['member' => $member]);

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function showMitra(){
        try {
            $mitra = User_role::with('user')->where('role_id', '2')->get();
            return view('admin.dashboard.mitra', ['mitra' => $mitra]);

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
