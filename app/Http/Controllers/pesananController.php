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
        // dd(request()->all());
        $id_produk = $request->get('id_produk');
        $total = $request->get('total');
        $harga = $request->get('harga');

        $data = new M_pemesanan();
        $data->no_order = $request->get('no_order');
        $data->nama = $request->get('nama');
        $data->no_wa = $request->get('no_wa');
        $data->alamat = $request->get('alamat');
        $data->status = 'Belum Proses';
        $data->created_at = date(now());
        $data->save();

        foreach ($id_produk as $produk) {
            M_detailPemesanan::create([
                'id_pemesanan' => $data->id,
                'id_produk' => $produk
            ]);
        }
        $tot = 0;
        foreach ($total as $t => $key) {
            foreach ($harga as $h => $val) {
                if ($t == $h) {
                    if ($key == null) {
                        $key = 0;
                    } else {
                        $key = $key;
                    }
                    $total_harga = $key * $val;
                    $tot += $total_harga;

                    M_detailTotalPemesanan::create([
                        'id_pemesanan' => $data->id,
                        'total' => $key,
                        'harga' => $total_harga
                    ]);
                }
            }
        }
        // dd($tot);
        return response()->json(['tot' => $tot, 'order' => $data->no_order]);
    }
}
