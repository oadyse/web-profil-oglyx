<?php

namespace App\Http\Controllers;

use App\Models\M_detailPemesanan;
use App\Models\M_detailTotalPemesanan;
use App\Models\M_pemesanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'orders' => M_pemesanan::all(),
        ];
        // dd($data['produks']);
        return view('dashboard', $data);
    }

    public function detail($id)
    {
        $data = [
            'details' => M_detailPemesanan::getDetail($id),
            'totals' => M_detailTotalPemesanan::getTotal($id),
            'pesanan' => M_pemesanan::where('id', $id)->first()
        ];
        // dd($data['totals']);
        return view('detail', $data);
    }

    public function changeStatus(Request $request, $id)
    {
        $process = M_pemesanan::findOrFail($id)->update([
            'status' => $request->status,
        ]);
        if ($process) {
            return redirect()->back()->with("successUpdate", "Data updated successfully");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }
}
