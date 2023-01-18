<?php

namespace App\Http\Controllers;

use App\Models\M_pemesanan;
use App\Models\M_detailPemesanan;
use App\Models\M_detailTotalpemesanan;
use App\Models\M_produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $data = [
            'produks' => M_produk::all(),
        ];
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

    public function search(Request $request)
    {
        $keyword = $request->search;
        $data = M_pemesanan::where('no_order', 'like', "%" . $keyword . "%")->paginate();
        // $details = M_detailPemesanan::getDetail($data->id);
        return view('cek_pesanan', compact('keyword', 'data'));
    }
}
