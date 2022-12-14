<?php

namespace App\Http\Controllers;

use App\Models\M_produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $data = [
            'produks' => M_produk::all(),
        ];
        // $data['produks'];
        return view('produk', $data);
    }

    public function login()
    {
        return view('login');
    }

    public function detail($id)
    {
        $data = [
            'produk' => M_produk::where('id', $id)->first(),
        ];
        return view('produk_detail', $data);
    }
}
