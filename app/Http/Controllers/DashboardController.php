<?php

namespace App\Http\Controllers;

use App\Models\M_detailPemesanan;
use App\Models\M_detailTotalPemesanan;
use App\Models\M_pemesanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

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
            'totals' => M_detailTotalPemesanan::getTotal($id)
        ];
        // dd($data['totals']);
        return view('detail', $data);
    }
}
