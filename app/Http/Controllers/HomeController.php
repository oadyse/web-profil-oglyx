<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('produk');
    }

    public function login()
    {
        return view('login');
    }

    public function detail()
    {
        return view('produk_detail');
    }
}
