<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    function index(){
       return view ('admin.blogs.index');
    }
}
