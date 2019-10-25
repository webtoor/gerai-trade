<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function showMitra(){
        $admin = Auth::user();
        return User::find($admin->id);
    }
}
