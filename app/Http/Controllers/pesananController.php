<?php

namespace App\Http\Controllers;

use App\Models\M_detailPemesanan;
use App\Models\M_detailTotalPemesanan;
use App\Models\M_pemesanan;
use Illuminate\Http\Request;

class pesananController extends Controller
{
    public function addPesanan(Request $request)
    {
        $id_produk = $request->get('id_produk');
        $total = $request->get('total');

        $data = new M_pemesanan();
        $data->nama = $request->get('nama');
        $data->no_wa = $request->get('no_wa');
        $data->alamat = $request->get('alamat');
        $data->save();

        foreach ($id_produk as $produk) {
            M_detailPemesanan::create([
                'id_pemesanan' => $data->id,
                'id_produk' => $produk
            ]);
        }

        foreach ($total as $t) {
            if ($t == null) {
                $t = 0;
            } else {
                $t = $t;
            }
            M_detailTotalPemesanan::create([
                'id_pemesanan' => $data->id,
                'total' => $t
            ]);
        }

        return response()->json(true);
    }
}
